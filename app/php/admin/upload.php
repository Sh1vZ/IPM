<?php
include(dirname(__FILE__) . "/../conn.php");

if(isset($_POST['name'])||isset($_POST['prijs'])|| isset($_POST['file'])){ 

    $naam= $_POST['name'];
    $prijs= $_POST['prijs'];
    $file= $_FILES['file'];
    
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
   
    $fileExt = explode('.', $fileName);
    $fileActualExt= strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx');
 
    if(in_array($fileActualExt, $allowed)){
       if($fileError === 0){
         $fileNameNew = uniqid('', true).".". $fileActualExt;
         $fileDestination = '../../../app/uploads/documenten/'.$fileName;
         move_uploaded_file($fileTmpName, $fileDestination);

         $sql =" INSERT INTO template (naam,Prijs,Path) VALUES('$naam','$prijs','$fileName')";
					$execute = mysqli_query($conn, $sql);
                    if ($execute == true) {
                   echo "success";
       
                    } else {
                  echo  "Error: "  . mysqli_error($conn);
                }
			
         
          }
       else {
           echo "Er is een error opgetreden bij het uploaden van uw file";
       }

    }else{
        echo "Files van deze type kunnen niet geupload worden";
    }



}

