<?php
include 'conn.php';
include 'generateStudentenkaart.php';

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

//READ EXCEL FILE
require "../../vendor/autoload.php";
$valid_extensions = array('xls', 'xlsx'); // valid extensions
if ($_FILES['data']['name'] == "") {
	echo "errorEmpty";
	
}else{
	$file = $_FILES['data']['tmp_name'];
	$name= $_FILES['data']['name'];
	$targetPath = '../uploads/' . $name;
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
	$err = 2;
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
			$b = generateQrcode($data[0], $data[1], $data[5]);
			$a = Generate($data[0], $data[1], $data[2], $data[4], $b);

			// INSERT EXCEL DATA AND IMAGE STORE NAME
			$sql = "INSERT INTO studenten (Achternaam,Voornaam,Geboortedatum,Geboorteplaats,Student_email,Student_pincode,Saldo,img) VALUES(?,?,?,?,?,?,?,?)";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				echo "sqlError";
				$err = 1;
			} else {
				mysqli_stmt_bind_param($stmt, "ssssssss", $data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $a);
				mysqli_stmt_execute($stmt);
				$err = 0;
			}
		} else {
			$isheader = 1;
			$data = [];
		}
	}
}
	if ($err == 0) {
		if (unlink($targetPath)) {
			echo "success";
		} else {
			echo 'errorr';
		}
	} elseif ($err == 1) {
		echo "error";
	} else {
		echo "FATALERROR";
	}
}
