<?php

include(dirname(__FILE__) . "/../conn.php");

$sql = "SELECT Voornaam, achternaam, Student_email as Student_email, Logdatum 
        from log, studenten 
        where studenten.stud_ID=log.StudentID 
        order by log.Logdatum DESC limit 5";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>	
    <tr>
    
        <td><?=$row['achternaam'];?></td>
        <td><?=$row['Voornaam'];?></td>
        <td><?=$row['Student_email'];?></td>
        <td><?=$row['Logdatum'];?></td>
       
    </tr>
<?php	
}
}
else {
    echo "0 results";
}

?>
