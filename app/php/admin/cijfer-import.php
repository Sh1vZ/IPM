<?php
include '../conn.php';
include 'generateStudentenkaart.php';

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

//READ EXCEL FILE
require "../../../vendor/autoload.php";
$err = 2;
$valid_extensions = array('xls', 'xlsx'); // valid extensions
if ($_FILES['data']['name'] == "") {
  echo "errorEmpty";
} else {
  $file = $_FILES['data']['tmp_name'];
  $name = $_FILES['data']['name'];
  $targetPath = '../../uploads/' . $name;
  $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));

  if (in_array($ext, $valid_extensions)) {
    move_uploaded_file($file, $targetPath);
    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $spreadSheet = $reader->load($targetPath);
    $excelSheet = $spreadSheet->getActiveSheet();
    $spreadSheetAry = $excelSheet->toArray();
    $sheetCount = count($spreadSheetAry);

    $isheader = 0;
    $i = 0;

    //LOOP ECXCEL FILE DATA
    foreach ($excelSheet->getRowIterator() as $row) {
      $a = $i++;
      if ($isheader > 0) {
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false);
        $data = [];
        foreach ($cellIterator as $cell) {
          $data[] = $cell->getValue();
        }
        $rid = "SELECT richting_ID from richtingen WHERE Richtingnaam='$data[3]'";
        $resr = mysqli_query($conn, $rid);
        if (mysqli_num_rows($resr) > 0) {
          while ($row = mysqli_fetch_assoc($resr)) {
            $rid   = $row['richting_ID'];
          }
        }
        $vakid = "SELECT vak_id FROM vakken WHERE Vaknaam ='$data[2]' AND Vak_richting=$rid";
        $resv = mysqli_query($conn, $vakid);
        if (mysqli_num_rows($resv) > 0) {
          while ($row = mysqli_fetch_assoc($resv)) {
            $vid   = $row['vak_id'];
          }
        }
        $klasid = "SELECT ID FROM klassen WHERE Klas ='$data[4]' AND RichtingID=$rid";
        $resk = mysqli_query($conn, $klasid);
        if (mysqli_num_rows($resk) > 0) {
          while ($row = mysqli_fetch_assoc($resk)) {
            $kid   = $row['ID'];
          }
        }
        $studid = "SELECT stud_ID FROM studenten WHERE Achternaam ='$data[0]' AND Voornaam='$data[1]'";
        $ress = mysqli_query($conn, $studid);
        if (mysqli_num_rows($ress) > 0) {
          while ($row = mysqli_fetch_assoc($ress)) {
            $sid   = $row['stud_ID'];
            $sel = "SELECT * FROM cijfers WHERE student_id=$sid AND VakID=$vid AND klas_id=$kid";
            $result = mysqli_query($conn, $sel);
            if (mysqli_num_rows($result) > 0) {
              $err=1;
              while ($row = mysqli_fetch_assoc($result)) {
              }
            } else {
              $insert = "INSERT INTO cijfers (student_id,VakID,klas_id,Periode,Cijfer) VALUES ($sid,$vid,$kid,'$data[5]',$data[6])";
              $ex = mysqli_query($conn, $insert);
              if ($ex) {
                $err = 0;
              } else {
                echo 'sqlError';
              }
            }
          }
        }
      } else {
        $isheader = 1;
        $data = [];
      }
    }
  } else {
    echo "errorEmpty";
  }

  if ($err == 0) {
    if (unlink($targetPath)) {
      echo "success";
    } else {
      echo 'errorr';
    }
  } elseif ($err == 1) {
    echo "bestaat";
  }
 
}
