<?php

include(dirname(__FILE__) . "/../conn.php");

$sql = "SELECT * FROM docenten";
$result = $conn->query($sql);
if ($result->num_rows > 0) {


  while ($row = $result->fetch_assoc()) {
?>
    <tr>
      <td><?= $row['docent_naam']; ?></td>
      <td><?= $row['docent_email']; ?></td>
      <td><?= $row['nummer']; ?></td>
      <td><button type="button" name="edit" class="btn btn-primary btn-md edit" value="<?= $row['docent_ID'] ?>">Edit</button>
      <button type="button" name="delete" class="btn btn-danger btn-md delete" value="<?= $row['docent_ID'] ?>">Delete</button>
      </td>
    </tr>
<?php
  }
} else {
  echo "0 results";
}
