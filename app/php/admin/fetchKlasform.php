<?php

include(dirname(__FILE__) . "/../conn.php");

$sql = "SELECT st_klas_ID, Voornaam, Achternaam, Student_email , Klas, Richtingnaam,docent_naam, Schooljaar from klassen, studenten, studentklas, richtingen, docenten where studenten.stud_ID=studentklas.StudentID AND klassen.ID=studentklas.KlasID AND richtingen.richting_ID=klassen.RichtingID AND docenten.docent_ID=klassen.Klas_docent";

$result = $conn->query($sql);
if ($result->num_rows > 0) {


  while ($row = $result->fetch_assoc()) {
?>
    <tr>
        <td><?= $row['Achternaam']; ?></td>
        <td><?=$row['Voornaam'];?></td>
        <td><?=$row['Student_email'];?></td>
        <td><?=$row['Klas'];?></td>
        <td><?=$row['Richtingnaam'];?></td>
        <td><?=$row['docent_naam'];?></td>
        <td><?=$row['Schooljaar'];?></td>
        <td>      
        <button type="button" name="delete" class="btn btn-danger btn-md delete" value="<?= $row['st_klas_ID'] ?>">Verwijderen</button>
        </td>
    </tr>
<?php
  }
} else {
    echo "0 results";
}
?>