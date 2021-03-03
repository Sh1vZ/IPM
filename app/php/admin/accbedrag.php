<?php
if(isset($_POST['Acc'])){
    $sql  = "UPDATE upreq INNER JOIN studenten ON upreq.Student_ID=studenten.stud_ID SET upreq.Status='True'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
      $sql1  = "UPDATE studenten INNER JOIN upreq ON studenten.stud_ID = upreq.Student_ID SET Saldo = Saldo + Bedrag";
      $res1 = mysqli_query($conn, $sql1);

      if ($res1) {
        echo '<script>alert("Opwaardering geaccepteerd")</script>';

      }
    } else {
      echo "Sqlerror";
    }
}
?>
