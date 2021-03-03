<?php
include(dirname(__FILE__) . "/../conn.php");
if (isset($_POST["insert"])) {
	//insert
		$naam = $_POST['naam'];
		$mail = $_POST['email'];
		$nummer = $_POST['nummer'];
		if (empty($naam) || empty($mail) || empty($nummer)) {
			echo 'errorEmpty';
		} else {
			$sql = "SELECT docent_naam FROM docenten WHERE docent_naam= ?";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				echo "sqlError";
			} else {
				mysqli_stmt_bind_param($stmt, "s", $naam);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$resultcheck = mysqli_stmt_num_rows($stmt);
				if ($resultcheck > 0) {
					echo "exist";
				} else {
					$sql = "INSERT INTO docenten(docent_naam,docent_email,nummer) VALUES(?,?,?)";
					$stmt = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo "sqlError";
					} else {
						mysqli_stmt_bind_param($stmt, "sss", $naam, $mail, $nummer);
						mysqli_stmt_execute($stmt);
						echo "success";
					}
				}
			}
		}
	}


if (isset($_POST['updateDocent'])) {
	$id = $_POST['id'];
	$naam = $_POST['naam'];
	$mail = $_POST['email'];
	$nummer = $_POST['nummer'];
	if (empty($naam) || empty($mail) || empty($nummer)) {
		echo 'errorEmpty';
	} else {
		$sql = "UPDATE docenten SET docent_naam=?,docent_email=?,nummer=? WHERE docent_ID=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			echo "sqlError";
		} else {
			mysqli_stmt_bind_param($stmt, "sssi", $naam, $mail, $nummer, $id);
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
	$sql = "DELETE FROM docenten WHERE docent_ID=? ";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo "sqlError";
	} else {
		mysqli_stmt_bind_param($stmt, "i", $id);
		mysqli_stmt_execute($stmt);
		echo "success";
	}
}
