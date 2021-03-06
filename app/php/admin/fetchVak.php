<?php

include(dirname(__FILE__) . "/../conn.php");

$sql = "select vak_ID, Vaknaam, Richtingnaam as Vak_richting, docent_naam as Vak_docent
from vakken, docenten , richtingen 
where vakken.Vak_docent=docenten.docent_ID and vakken.Vak_richting=richtingen.richting_ID order by vak_ID desc";
$result = $conn->query($sql);
if ($result->num_rows > 0) {


  while ($row = $result->fetch_assoc()) {
?>
    <tr>
      <td><?= $row['Vaknaam']; ?></td>
      <td><?= $row['Vak_richting']; ?></td>
      <td><?= $row['Vak_docent']; ?></td>
      <td><button type="button" name="edit" class="btn btn-primary btn-md edit" value="<?= $row['vak_ID'] ?>">Bewerken</button>
      <button type="button" name="delete" class="btn btn-danger btn-md delete" value="<?= $row['vak_ID'] ?>">Verwijderen</button>
      </td>
    </tr>
<?php
  }
} else {
  echo "Geen resultaten, voeg dit zelfs toe";
}
?>