<?php
session_start();

include "../conn.php";
$stud_ID=$_SESSION['stud_ID'];
$dt=date("Y-m-d");
$false='False';
$bedrag=$_POST['bedrag'];
// $sql = "INSERT INTO upreq (ID, Student_ID, Bedrag, Datum, Status) VALUES (NULL, '$stud_ID', '$bedrag', '$dt', 'False')";
// if (mysqli_query($conn, $sql)) {
// echo "data inserted";}
// else {
// echo "failed";
// }
// mysqli_close($conn);


$sql = "SELECT Student_ID FROM upreq WHERE Student_ID= ? and Status= 'False'";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "sqlError";
} else {
    mysqli_stmt_bind_param($stmt, "i", $stud_ID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $resultcheck = mysqli_stmt_num_rows($stmt);
    if ($resultcheck > 0) {
        echo "exist";
    } else {
        $sql = "INSERT INTO upreq (Student_ID, Bedrag, Datum, Status) VALUES(?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "sqlError";
        } else {
            mysqli_stmt_bind_param($stmt, "idss", $stud_ID, $bedrag, $dt, $false);
            mysqli_stmt_execute($stmt);
            echo "success";
        }
    }
}
