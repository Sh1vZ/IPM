<?php

include(dirname(__FILE__) . "/../conn.php");

$sql = "SELECT * FROM richtingen order by richting_ID desc";

$result = $conn->query($sql);
if ($result->num_rows > 0) {


  while ($row = $result->fetch_assoc()) {
?>
    <tr>
      <td><?= $row['Richtingnaam']; ?></td>
      <td><button type="button" name="edit" class="btn btn-primary btn-md edit" value="<?= $row['richting_ID'] ?>">Bewerken</button>
      <button type="button" name="delete" class="btn btn-danger btn-md delete" value="<?= $row['richting_ID'] ?>">Verwijderen</button>
      </td>
    </tr>
<?php
  }
} else {
  echo "0 results";
}
?>