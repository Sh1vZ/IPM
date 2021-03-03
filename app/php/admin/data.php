<?php

include '../conn.php';

$result = mysqli_query($conn, "SELECT * FROM studenten,upreq WHERE studenten.stud_ID = upreq.Student_ID ");
$data = array();
while ($row = mysqli_fetch_object($result))
{
    array_push($data, $row);
}
echo json_encode($data);
exit();

 ?>
