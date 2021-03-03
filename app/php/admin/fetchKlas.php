<?php

include(dirname(__FILE__) . "/../conn.php");

$sql = "select ID, Klas, Richtingnaam as RichtingID, docent_naam as Klas_docent 
        from docenten, klassen , richtingen 
        where klassen.Klas_docent=docenten.docent_ID and klassen.RichtingID=richtingen.richting_ID 
        order by klassen.ID desc";
$result = $conn->query($sql);
if ($result->num_rows > 0) {


  while ($row = $result->fetch_assoc()) {
?>
    <tr>
      <td><?= $row['Klas']; ?></td>
      <td><?= $row['RichtingID']; ?></td>
      <td><?= $row['Klas_docent']; ?></td>
      <td><button type="button" name="edit" class="btn btn-primary btn-md edit" value="<?= $row['ID'] ?>">Bewerken</button>
      <button type="button" name="delete" class="btn btn-danger btn-md delete" value="<?= $row['ID'] ?>">Verwijderen</button>
      </td>
    </tr>
<?php
  }
} else {
  echo "0 results";
}
?>