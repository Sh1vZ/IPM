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
					$execute = mysqli_query($conn, $sql);
                    if ($execute == true) {
                   echo "success";
        // header("Location:../../../pages/admin/studenten.php");
                    } else {
                  echo  "Error: "  . mysqli_error($conn);
                }
			}
	}


if (isset($_POST['updateDocument'])) {
	$id = $_POST['id'];
	$naam = $_POST['naam'];
	$path = $_POST['path'];

	if (empty($naam)) {
		echo 'errorEmpty';
	} else {
		$sql = "UPDATE template SET naam=?, Path=? WHERE temp_ID=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			echo "sqlError";
		} else {
			mysqli_stmt_bind_param($stmt, "ssi", $naam, $path, $id);
			mysqli_stmt_execute($stmt);
			if (mysqli_errno($conn) == 1062) {
				echo "exist";
			} else {
				echo "success";
			}
		}
	}
}

if (isset($_POST['delete'])) {
	$id = $_POST['id'];
	$sql = "DELETE FROM template WHERE temp_ID=$id";
	
    $execute = mysqli_query($conn, $sql);
    if ($execute == true) {
   echo "success";
// header("Location:../../../pages/admin/studenten.php");
    } else {
  echo  "Error: "  . mysqli_error($conn);
}
}