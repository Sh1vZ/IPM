<?php

use Classes\GenerateOuderbrief;
// require_once '../../../classes';


require "../../../../IPM/classes/GenerateOuderbrief.php";

require_once '../../../../IPM/PDFGen Composer/vendor/autoload.php';//
include("../conn.php");

if (isset($_POST["insertOuderbrief"])) {

  

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
        

	
        $data=[
            'student' => $achternaam . ' ' . $voornaam,
            'klas' => $klas,
            'richting' => $richting
            
 ];

 
        $pdf = new GenerateOuderbrief;
        $response = $pdf-> generate($data);
        header('Location:../../../pages/user/downloadPDF.php?link='. $response);
    
       
        //  var_dump($response);

}}}

?>