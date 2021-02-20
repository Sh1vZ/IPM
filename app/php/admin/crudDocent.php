<?php
include(dirname(__FILE__)."/../conn.php");
	
//view

	$sql = "SELECT * FROM docenten";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {

		
		while($row = $result->fetch_assoc()) {
?>	
		<tr>
			
			<td><?=$row['docent_naam'];?></td>
			<td><?=$row['docent_email'];?></td>
			<td><?=$row['nummer'];?></td>
			<td><button type="button" name="delete" class="btn btn-danger btn-xs delete" value="<?=$row['docent_ID']?>">Delete</button></td>
			<td><button type="button" name="edit" class="btn btn-primary btn-xs edit" value="<?=$row['docent_ID']?>">Edit</button></td>

		</tr>
<?php	
	}
	}
	else {
		echo "0 results";
	}


	if(isset($_POST["action"]))
	{       

		//insert
		if($_POST["action"] == "insert")
		{
			$query = "
			INSERT INTO docenten (docent_naam, docent_email,nummer) VALUES ('".$_POST["naam"]."', '".$_POST["email"]."','".$_POST["nummer"]."')
			";
			
			$conn->query($query);
		}
		if($_POST["action"] == "fetch_single")
		{
			$query = "
			SELECT * FROM docenten WHERE docent_ID = '".$_POST["id"]."'
			";
			$result=$conn->query($query);
			foreach($result as $row)
			{
				$output['naam'] = $row['docent_naam'];
				$output['email'] = $row['docent_email'];
				$output['nummer'] = $row['nummer'];
			}
			echo json_encode($output);
		}
		if($_POST["action"] == "update")
		{     //update
			$query = "
			UPDATE docenten
			SET docent_naam = '".$_POST["naam"]."', 
			docent_email = '".$_POST["email"]."' 
			nummer = '".$_POST["nummer"]."' 
			WHERE docent_ID = '".$_POST["hidden_id"]."'
			";
			$conn->query($query);
		}
		if($_POST["action"] == "delete")
		{   //delete
			$query = "DELETE FROM docenten WHERE docent_ID = '".$_POST["id"]."'";
			$conn->query($query);
		}
	}
	
?>


  