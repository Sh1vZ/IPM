
<?php

include(dirname(__FILE__) . "/../conn.php");

$sql = "select CONCAT ( Achternaam, ' ', Voornaam) as studs, ID, Bedrag, Datum, AccDatum
from studenten, upreq
where studenten.stud_ID=upreq.Student_ID
order by ID DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>	
    <tr>
    
        <td><?=$row['studs'];?></td>
        <td>SRD <?=$row['Bedrag'];?></td>
        <td><?=$row['Datum'];?></td>
        <td><?=$row['AccDatum'];?></td>
       
    </tr>
<?php	
}
}
else {
    echo "Geen resultaten";
}

?>
