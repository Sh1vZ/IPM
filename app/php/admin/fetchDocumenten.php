<?php

include(dirname(__FILE__) . "/../conn.php");

$sql = "SELECT * FROM template order by temp_ID desc";
$result = $conn->query($sql);
if ($result->num_rows > 0) {


  while ($row = $result->fetch_assoc()) {
?>
    <tr>
      <td><?= $row['naam']; ?></td>
      
      <td><a  href="../../../IPM/app/php/admin/uploadDoc/<?php echo $row['Path'] ?>" target="_blank">Bekijken</a></td>

      <td><a href="../../../IPM/app/php/admin/uploadDoc/<?php echo $row['Path']; ?>" download>Downloaden</td>
      <td><button type="button" name="edit" class="btn btn-primary btn-md edit" value="<?= $row['temp_ID'] ?>">Bewerken</button>
      <button type="button" name="delete" class="btn btn-danger btn-md delete" value="<?= $row['temp_ID'] ?>">Verwijderen</button>
      </td>
    </tr>
<?php
  }
} else {
  echo "0 results";
}


?>