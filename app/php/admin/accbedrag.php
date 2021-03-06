<?php

if(isset($_POST['Acc'])){
  $id = $_POST['edit_id'];
  $dt=date("Y-m-d");
    $sql  = "SELECT * FROM studenten WHERE stud_ID='$id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
      $sql1  = "UPDATE upreq INNER JOIN studenten ON upreq.Student_ID=studenten.stud_ID SET Status='True', AccDatum='$dt' WHERE stud_ID='$id'";
      $res1 = mysqli_query($conn, $sql1);

      if ($res1) {
        $sql2  = "UPDATE studenten INNER JOIN upreq ON studenten.stud_ID = upreq.Student_ID SET Saldo = Saldo + Bedrag WHERE stud_ID='$id'";
        $res2 = mysqli_query($conn, $sql2);

      }
      if ($res2) {
        echo '<script>alert("Opwaardering geaccepteerd")</script>';

      }
    } else {
      echo "Sqlerror";
    }
}

?>
