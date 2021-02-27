<?php
include(dirname(__FILE__) . "/../conn.php");
if (isset($_POST["insert"])) {
	//insert
		$klas = $_POST['klas'];
		$richting = $_POST['richting'];
		$docent = $_POST['docent'];
		if (empty($klas) || empty($richting) || empty($docent)) {
			echo 'errorEmpty';
		} else {
			$sql = "SELECT Klas FROM klassen WHERE Klas= ?";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				echo "sqlError";
			} else {
				mysqli_stmt_bind_param($stmt, "s", $klas);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$resultcheck = mysqli_stmt_num_rows($stmt);
				if ($resultcheck > 0) {
					echo "exist";
				} else {
					$sql = "INSERT INTO klassen(Klas,RichtingID,Klas_docent) VALUES(?,?,?)";
					$stmt = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo "sqlError";
					} else {
						mysqli_stmt_bind_param($stmt, "sii", $klas, $richting, $docent);
						mysqli_stmt_execute($stmt);
						echo "success";
					}
				}
			}
		}
	}


if (isset($_POST['updateKlas'])) {
	$id = $_POST['id'];
	$klas = $_POST['klas'];
	$richting = $_POST['richting'];
	$docent = $_POST['docent'];
	if (empty($klas) || empty($richting) || empty($docent)) {
		echo 'errorEmpty';
	} else {
		$sql = "UPDATE klassen SET Klas=?, RichtingID=?, Klas_docent=? WHERE ID=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			echo "sqlError";
		} else {
			mysqli_stmt_bind_param($stmt, "siii", $klas, $richting, $docent, $id);
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
	$sql = "DELETE FROM klassen WHERE ID=? ";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo "sqlError";
	} else {
		mysqli_stmt_bind_param($stmt, "i", $id);
		mysqli_stmt_execute($stmt);
		echo "success";
	}
}
