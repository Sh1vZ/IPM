<?php

include(dirname(__FILE__) . "/../conn.php");

$sql = "SELECT cijf_ID, student_id,VakID,klas_id,Periode,Klas,Vaknaam,Richtingnaam FROM `cijfers` as c INNER JOIN klassen as k on c.klas_id =k.ID INNER JOIN vakken as v on c.VakID=v.vak_ID INNER JOIN richtingen as r on v.Vak_richting=r.richting_ID ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
?>
    <tr>

      <td><?= $row['Klas']; ?></td>
      <td><?= $row['Vaknaam']; ?></td>
      <td><?= $row['Periode']; ?></td>
      <td><?= $row['Richtingnaam']; ?></td>
      <td>
      <a href="./getCijferKlas.php?vak=<?=$row['VakID'];?>&klas=<?= $row['klas_id'];?>&per=<?= $row['Periode']; ?>" target="_blank"><button type="button" class="btn btn-primary btn-md edit">Cijfers</button></a>
      </td>
    </tr>
<?php
  }
} else {
  echo "0 results";
}

?>