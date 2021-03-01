<?php

include(dirname(__FILE__) . "/../conn.php");

$sql = "SELECT * FROM studenten order by stud_ID desc";
$result = $conn->query($sql);
if ($result->num_rows > 0) {


  while ($row = $result->fetch_assoc()) {
?>
    <tr>

      <td><?= $row['Achternaam']; ?></td>
      <td><?= $row['Voornaam']; ?></td>
      <td><?= $row['Geboortedatum']; ?></td>
      <td><?= $row['Geboorteplaats']; ?></td>
      <td><?= $row['Student_email']; ?></td>
      <td><button type="button" name="edit" class="btn btn-primary btn-md edit" value="<?= $row['stud_ID'] ?>">Bewerken</button>
      <button type="button" name="delete" class="btn btn-danger btn-md delete" value="<?= $row['stud_ID'] ?>">Verwijderen</button>
      </td>
    </tr>
<?php
  }
} else {
  echo "0 results";
}
?>