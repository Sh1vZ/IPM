<?php
include(dirname(__FILE__) . "/../conn.php");
if (isset($_POST["insert"])) {
	//insert
		$richting = $_POST['richting'];
		if (empty($richting) ) {
			echo 'errorEmpty';
		} else {
			$sql = "SELECT Richtingnaam FROM richtingen WHERE Richtingnaam= ?";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				echo "sqlError";
			} else {
				mysqli_stmt_bind_param($stmt, "s", $richting);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$resultcheck = mysqli_stmt_num_rows($stmt);
				if ($resultcheck > 0) {
					echo "exist";
				} else {
					$sql = "INSERT INTO richtingen(Richtingnaam) VALUES(?)";
					$stmt = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo "sqlError";
					} else {
						mysqli_stmt_bind_param($stmt, "s", $richting);
						mysqli_stmt_execute($stmt);
						echo "success";
					}
				}
			}
		}
	}


if (isset($_POST['updateRichting'])) {
	$id = $_POST['id'];
	$richting = $_POST['richting'];

	if (empty($richting) ) {
		echo 'errorEmpty';
	} else {
		$sql = "UPDATE richtingen SET Richtingnaam=? WHERE richting_ID=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			echo "sqlError";
		} else {
			mysqli_stmt_bind_param($stmt, "si", $richting, $id);
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
	$sql = "DELETE FROM richtingen WHERE richting_ID=? ";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo "sqlError";
	} else {
		mysqli_stmt_bind_param($stmt, "i", $id);
		mysqli_stmt_execute($stmt);
		echo "success";
	}
}
