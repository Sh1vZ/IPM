 <?php

include('conn.php');
						
// <?php
// if (isset($_POST['updateStudent'])) {
// 	$id = $_POST['id'];
// 	$Anaam = $_POST['Anaam'];
// 	$Vnaam = $_POST['Vnaam'];
// 	$GebDatum = $_POST['GebDatum'];
// 	$GebPlaats = $_POST['GebPlaats'];
// 	$Email = $_POST['Email'];
	
// 	if (empty($Anaam) || empty($Vnaam) || empty($GebDatum) || empty($GebPlaats) || empty($Email)) {
// 		echo 'errorEmpty';
// 	} else {
// 		$sql = "UPDATE studenten SET Achternaam=?,Voornaam=?,Geboortedatum=? ,Geboorteplaats=? ,Student_email=? WHERE stud_ID=?";
// 		$stmt = mysqli_stmt_init($conn);
// 		if (!mysqli_stmt_prepare($stmt, $sql)) {
// 			echo "sqlError";
// 		} else {
// 			mysqli_stmt_bind_param($stmt, "sssiss", $Anaam, $Vnaam,$GebDatum, $GebPlaats, $Email, $id);
// 			mysqli_stmt_execute($stmt);
// 			if (mysqli_errno($conn) == 1062) {
// 				echo "exist";
// 			} else {
// 				echo "success";
// 			}
// 		}
		
// 	}
// }


// update data query
if (isset($_POST['updateStudent'])) {
	$id = $_POST['id'];

      $Anaam= legal_input($_POST['Anaam']);
      $Vnaam= legal_input($_POST['Vnaam']);
      $GebDatum = legal_input($_POST['GebDatum']);
      $GebPlaats = legal_input($_POST['GebPlaats']);
      $Email = legal_input($_POST['Email']);

      $query="UPDATE studenten
              SET Achternaam='$Anaam',
                  Voornaam='$Vnaam',
                  Geboortedatum= '$GebDatum',
                  Geboorteplaats='$GebPlaats'
                  Student_email='$Email' WHERE stud_ID=$id";

      $exec= mysqli_query($conn,$query);
  
      if($exec){
        
         echo "data was updated"; 
        
      }else{
         $msg= "Error: " . $query . "<br>" . mysqli_error($conn);
         echo $msg; 
      }
}
	



?>
