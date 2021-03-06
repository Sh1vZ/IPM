<?php
include '../conn.php';
session_start();
$id = $_SESSION['stud_ID'];

$sql = "SELECT Saldo FROM studenten WHERE stud_ID= ?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
  echo "sqlError";
} else {
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);
  while ($row = mysqli_fetch_assoc($res)) {
    $saldo = $row['Saldo'];
  }
  if ($saldo == NULL) {
    echo "00.00";
  } else {

    echo $saldo;
  }
}
mysqli_stmt_close($stmt);
