<?php


namespace Classes;
session_start();



use mikehaertl\pdftk\Pdf;
use FFI\Exception;

class GeneratePDF {


      public function generate($data)
      {      

                  try {
                        include("C:\wamp64\www\IPM\IPM\app\php\conn.php");
                        $studID = $_SESSION['stud_ID'];
                        $sql = "SELECT * from studenten where stud_ID= '". $studID ."'";
                        $res = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($res) > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {

                      $achternaam=$row['Achternaam'];
                      $voornaam=$row['Voornaam'];}}

                        $filename = 'Dispensatiebrief_'.$achternaam.'_'. $voornaam.'.pdf';

                        $pdf = new Pdf('C:\wamp64\www\IPM\IPM\Dispensatiebrief template.pdf', [
                              
                              
                              'command' => 'C:\Program Files (x86)\PDFtk Server\bin\pdftk.exe',
                              'useExec' => true,  // May help on Windows systems if execution fails
                          ]);
                        $pdf->fillForm($data)
                        ->flatten()
                        ->saveAs( __DIR__ .'/completed/' . $filename);
                     
                        $Path= $filename;
                        $_SESSION['Path'] = $Path;
                        if ($pdf ->saveAs( __DIR__ .'/completed/' . $filename)) {
                              
                        
                              print "success";

                              

                        } else{ print "error";}

                         return $filename;
                  }

              catch(Exception $e)
              {
                    return $e->getMessage();
              }

            
      }
}
      

                       
                        // $sql="insert into student_template where StudentID = ''";
                        // include(dirname(__FILE__) . "/../../IPM/app/php/conn.php");
                        
                        //       //insert
                        //       $path= __DIR__ .'/completed/' . $filename;
                                    
                        
                                    // if ($pdf->saveAs('C:\wamp64\www\IPM\IPM\Dispensatiebrief template.pdf')) {
                                          
                                    //       $file = 'C:\wamp64\www\IPM\IPM\app\uploads\studentenkaarten\Kristof_Roberto_848438.png';

                                    //       if (file_exists($file)) {
                                    //           header('Content-Description: File Transfer');
                                    //           header('Content-Type: application/octet-stream');
                                    //           header('Content-Disposition: attachment; filename='.basename($file));
                                    //           header('Expires: 0');
                                    //           header('Cache-Control: must-revalidate');
                                    //           header('Pragma: public');
                                    //           header('Content-Length: ' . filesize($file));
                                    //           ob_clean();
                                    //           flush();
                                    //           readfile($file);
                                    //       }
                                    // }
                                         
                              //             $sql =" INSERT INTO student_template (Path) VALUES('$path')";
                              //                         $execute = mysqli_query($conn, $sql);
                              //               if ($execute == true) {
                              //              echo "success";
                              //   // header("Location:../../../pages/admin/studenten.php");
                              //               } else {
                              //             echo  "Error: "  . mysqli_error($conn);
                              //           }
                              //             }
                              

                        

                        //->send( $filename . '.pdf');
                        // if (!$pdf->saveAs('C:\wamp64\www\IPM\IPM\Dispensatiebrief template.pdf')) {
                              // $error = $pdf->getError();
                              // print $error;
                        //   }

                                        
                  
                  