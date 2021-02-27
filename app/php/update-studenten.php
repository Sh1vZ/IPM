 <?php

include('conn.php');
						

if (isset($_POST['updateStudent'])) {

    	$id = $_POST['id'];
      $Anaam= $_POST['Anaam'];
      $Vnaam= $_POST['Vnaam'];
      $GebDatum= $_POST['GebDatum'];
      $GebPlaats = $_POST['GebPlaats'];
      $Email = $_POST['Email'];
      $page = $_SERVER['PHP_SELF'];
$sec = "10";
header("Refresh: $sec; url=$page");

      if (empty($Anaam) || empty($Vnaam) || empty($GebDatum) || empty($GebPlaats) || empty($Email)) {
         echo 'errorEmpty';
      } else {
         $sql = "UPDATE studenten SET Achternaam=?,Voornaam=?,Geboortedatum=?, Geboorteplaats=?,Student_email=? WHERE stud_ID=?";
         $stmt = mysqli_stmt_init($conn);
         if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "sqlError";
         } else {
            mysqli_stmt_bind_param($stmt, "sssssi", $Anaam,$Vnaam, $GebDatum, $GebPlaats, $Email, $id);
            mysqli_stmt_execute($stmt);
            if (mysqli_errno($conn) == 1062) {
               echo "exist";
            } else {
               // header("Location:../../pages/admin/studenten.php");
               header("Refresh: $sec; url=$page");
            }
         }
      }
   }



