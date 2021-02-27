<?php

include('conn.php');
						

if (isset($_POST['updateStudent'])) {

    	$id = $_POST['id'];
      $Anaam= $_POST['Anaam'];
      $Vnaam= $_POST['Vnaam'];
      $GebDatum= $_POST['GebDatum'];
      $GebPlaats = $_POST['GebPlaats'];
      $Email = $_POST['Email'];

      if (empty($path) || empty($naam)) {
         echo 'errorEmpty';
      } else {
         $sql = "UPDATE studenten SET Path=?,naam=? WHERE temp_ID=?";
         $stmt = mysqli_stmt_init($conn);
         if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "sqlError";
         } else {
            mysqli_stmt_bind_param($stmt, "sssssi", $Anaam,$Vnaam, $GebDatum, $GebPlaats, $Email, $id);
            mysqli_stmt_execute($stmt);
            if (mysqli_errno($conn) == 1062) {
               echo "exist";
            } else {
               echo "success";
            }
         }
      }
   }



