<?php

include(dirname(__FILE__) . "/../conn.php");

$sql = "SELECT * FROM docenten order by docent_ID desc";
$result = $conn->query($sql);
if ($result->num_rows > 0) {


  while ($row = $result->fetch_assoc()) {
?>
    <tr>
      <td><?= $row['docent_naam']; ?></td>
      <td><?= $row['docent_email']; ?></td>
      <td><?= $row['nummer']; ?></td>
      <td><button type="button" name="edit" class="btn btn-primary btn-md edit" value="<?= $row['docent_ID'] ?>">Bewerken</button>
      <button type="button" name="delete" class="btn btn-danger btn-md delete" value="<?= $row['docent_ID'] ?>">Verwijderen</button>
      </td>
    </tr>
<?php
  }
} else {
  echo "Geen resultaten, voeg dit zelfs toe";
}
?>