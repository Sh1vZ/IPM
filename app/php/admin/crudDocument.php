<?php
include(dirname(__FILE__) . "/../conn.php");
if (isset($_POST["insert"])) {
	//insert
		$naam = $_POST['naam'];
		$path= $_POST['path'];

		if (empty($naam) || empty($path)) {
			echo 'errorEmpty';
		} else {
			$sql =" INSERT INTO template (naam,Path) VALUES('$naam','$path')";
					$execute = mysqli_query($db, $sql);
                    if ($execute == true) {
                   echo "success";
        // header("Location:../../../pages/admin/studenten.php");
                    } else {
                  echo  "Error: "  . mysqli_error($db);
                }
			}
	}


if (isset($_POST['updateDocument'])) {
	$id = $_POST['id'];
	$naam = $_POST['naam'];
	$path = $_POST['path'];

	if (empty($naam) || empty($path)) {
		echo 'errorEmpty';
	} else {
		$sql = "UPDATE template SET naam=$naam,Path=$path WHERE temp_ID=$id";
		$execute = mysqli_query($db, $sql);
                    if ($execute == true) {
                   echo "success";
        // header("Location:../../../pages/admin/studenten.php");
                    } else {
                  echo  "Error: "  . mysqli_error($db);
                }
			}
	}

if (isset($_POST['delete'])) {
	$id = $_POST['id'];
	$sql = "DELETE FROM template WHERE temp_ID=$id";
	
    $execute = mysqli_query($db, $sql);
    if ($execute == true) {
   echo "success";
// header("Location:../../../pages/admin/studenten.php");
    } else {
  echo  "Error: "  . mysqli_error($db);
}
}