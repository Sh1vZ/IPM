<?php

use Classes\GeneratePDF;
// require_once '../../../classes';
session_start();
require "../../../../IPM/classes/GeneratePDF.php";


require_once '../../../../IPM/PDFGen Composer/vendor/autoload.php';//
include("../conn.php");
if ($_SERVER['REQUEST_METHOD']='POST') {

    $studID = $_SESSION['stud_ID'];
     $sql = "SELECT  studenten.Achternaam, studenten.Voornaam, klassen.Klas, richtingen.Richtingnaam, studentklas.st_klas_ID from studentklas
      left join klassen on studentklas.KlasID= klassen.ID
      left join richtingen on klassen.RichtingID= richtingen.richting_ID
     left join studenten on studentklas.StudentID= studenten.stud_ID
     where studentklas.StudentID= '". $studID ."'";
    $res = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($res) > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {

         $achternaam=$row['Achternaam'];
         $voornaam=$row['Voornaam'];
         $klas=$row['Klas'];
         $richting= $row['Richtingnaam'];
         setlocale(LC_TIME, 'NL_nl');
         $datum = strftime('%e %B %Y');
       
	
        $data=[
            'Student' => $achternaam . ' ' . $voornaam,
            'Klas' => $klas,
            'Richting' => $richting,
            'Datum' => $datum
 ];
       

$sql2 = "SELECT Prijs FROM template where naam='Dispensatiebrief'";
      $res = mysqli_query($conn, $sql2);
      if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
          $prijs = $row['Prijs'];

          $sql2 = "SELECT Saldo FROM studenten where stud_ID = $studID";
          $res = mysqli_query($conn, $sql2);
          if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
              $saldo = $row['Saldo'];


              if ($saldo < $prijs){  echo "no";
              } else {
                $sql4 = " UPDATE studenten
                SET Saldo = Saldo - $prijs
               WHERE stud_ID = $studID";
                $res = mysqli_query($conn, $sql4);
 $pdf = new GeneratePdf;
 $response = $pdf-> generate($data); 
 echo '../../../../../IPM/IPM/pages/user/DownloadPDF.php?link='. $response;
exit;
  
       

}
}}
         }}}}}
                       
                       
                        



?>