<?php
session_start();

include "../conn.php";
$stud_ID=$_SESSION['stud_ID'];
$dt=date("Y-m-d");
$bedrag=$_POST['bedrag'];
$sql = "INSERT INTO `upreq` (`ID`, `Student_ID`, `Bedrag`, `Datum`, `Status`) VALUES (NULL, '$stud_ID', '$bedrag', '$dt', 'False')";
if (mysqli_query($conn, $sql)) {
  echo json_encode(array("statusCode"=>200));
}
else {
  echo json_encode(array("statusCode"=>201));
}
mysqli_close($conn);


 ?>
