<?php

include(dirname(__FILE__) . "/../conn.php");

$sql = "select vak_ID, Vaknaam, docent_naam as Vak_docent, Richtingnaam as Vak_richting
        from docenten, richtingen, vakken 
        where docenten.docent_ID=vakken.Vak_docent and richtingen.richting_ID=vakken.Vak_richting 
        order by vak_ID desc";
$result = $conn->query($sql);
if ($result->num_rows > 0) {


  while ($row = $result->fetch_assoc()) {
?>
    <tr>
      <td><?= $row['Vaknaam']; ?></td>
      <td><?= $row['Vak_docent']; ?></td>
      <td><?= $row['Vak_richting']; ?></td>
      <td><button type="button" name="edit" class="btn btn-primary btn-md edit" value="<?= $row['vak_ID'] ?>">Bewerken</button>
      <button type="button" name="delete" class="btn btn-danger btn-md delete" value="<?= $row['vak_ID'] ?>">Verwijderen</button>
      </td>
    </tr>
<?php
  }
} else {
  echo "0 results";
}
?>