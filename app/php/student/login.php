<?php
include "../conn.php";

if (!empty($_POST['qrcode'])) {
  // |Achternaam|pincode|
  $qrcode = $_POST['qrcode'];

  $arr = explode('|', $qrcode);
  $username = $arr[1];
  $pincode = $arr[2];

  $sql = "SELECT * FROM studenten WHERE Achternaam = '$username' AND Student_pincode = '$pincode' ";

  $resultSQL = mysqli_query($conn, $sql);

  $result = mysqli_fetch_array($resultSQL);

  if (mysqli_num_rows($resultSQL) > 0) {
    session_start();
    $_SESSION['Achternaam'] = $result['Achternaam'];
    $_SESSION['IsActive'] = TRUE;
echo "success";
  }
   else {
    echo "error";
  }
}
