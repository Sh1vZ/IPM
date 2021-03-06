<?php  
 //export.php  
//  if(isset($_POST["insert"]))  
//  {  
//     $naam = $_POST['naam'];
//     $file= $_POST['file'];
//     $student= $_POST['student'];

//     if (empty($naam) || empty($file)|| empty($student)) {
//         echo 'errorEmpty';
//     } else {
//         $sql =" INSERT INTO template (naam,Path, stud_ID) VALUES('$naam','$path', $student)";
//                 $execute = mysqli_query($conn, $sql);
//                 if ($execute == true) {
//                echo "success";
//     // header("Location:../../../pages/admin/studenten.php");
//                 } else {
//               echo  "Error: "  . mysqli_error($conn);
//             }
//         }
// }
 ?>  

<?php
//check if form is submitted
if (isset($_POST['submit']))
{
    $filename = $_FILES['file']['name'];

    //upload file
    if($filename != '')
    {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $allowed = ['pdf', 'txt', 'doc', 'docx', 'png', 'jpg', 'jpeg',  'gif'];
    
        //check if file type is valid
        if (in_array($ext, $allowed))
        {
            // get last record id
            $sql = 'select max(temp_ID) as id from template';
            $result = mysqli_query($con, $sql);
            if (count($result) > 0)
            {
                $row = mysqli_fetch_array($result);
                $filename = ($row['temp_ID']+1) . '-' . $filename;
            }
            else
                $filename = '1' . '-' . $filename;

            //set target directory
            $path = 'uploads/';
                
            $created = @date('Y-m-d H:i:s');
            move_uploaded_file($_FILES['file']['tmp_name'],($path . $filename));
            
            // insert file details into database
            $sql = "INSERT INTO template(name, created) VALUES('$filename', '$created')";
            mysqli_query($con, $sql);
            echo "success";
     header("Location:../../../pages/admin/document.php");
               } else {
              echo  "Error: "  . mysqli_error($conn);
             }
         }
}
?>