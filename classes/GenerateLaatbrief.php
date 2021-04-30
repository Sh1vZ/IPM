<?php


namespace Classes;




use mikehaertl\pdftk\Pdf;
use FFI\Exception;

session_start();



class GenerateLaatbrief {


      public function generate($data)
      {      

                  try {
                        include(dirname(__FILE__) . "/../app/php/conn.php");
                        $studID = $_SESSION['stud_ID'];
                        $sql = "SELECT * from studenten where stud_ID= '". $studID ."'";
                        $res = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($res) > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {

                      $achternaam=$row['Achternaam'];
                      $voornaam=$row['Voornaam'];}}

                        $filename = 'Laatbrief_'.$achternaam.'_'. $voornaam.'.pdf';

                        $pdf = new Pdf(dirname(__FILE__) . "/../app/uploads/documenten/template_Laatbrief.pdf", [
                              
                              
                              'command' => 'C:\Program Files (x86)\PDFtk Server\bin\pdftk.exe',
                              'useExec' => true,  // May help on Windows systems if execution fails
                          ]);
                        $pdf->fillForm($data)
                        ->flatten()
                        ->saveAs( __DIR__ .'/completed/' . $filename);
                         return $filename;
                  }

              catch(Exception $e)
              {
                    return $e->getMessage();
              }

            
      }
}
?>    

                       
                      
                  
                  