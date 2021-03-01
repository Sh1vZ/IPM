<?php
include(dirname(__FILE__) . "/../conn.php");
if (isset($_POST["insert"])) {
	//insert
		$vak = $_POST['vak'];
		$richting = $_POST['richting'];
		$docent = $_POST['docent'];
		if (empty($vak) || empty($richting) || empty($docent)) {
			echo 'errorEmpty';
		} else {
			$sql = "SELECT Vaknaam FROM vakken WHERE Vaknaam= ?";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				echo "sqlError";
			} else {
				mysqli_stmt_bind_param($stmt, "s", $vak);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$resultcheck = mysqli_stmt_num_rows($stmt);
				if ($resultcheck > 0) {
					echo "exist";
				} else {
					$sql = "INSERT INTO vakken(Vaknaam,Vak_richting,Vak_docent) VALUES(?,?,?)";
					$stmt = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo "sqlError";
					} else {
						mysqli_stmt_bind_param($stmt, "sii", $vak, $richting, $docent);
						mysqli_stmt_execute($stmt);
						echo "success";
					}
				}
			}
		}
	}


if (isset($_POST['updateVak'])) {
	$id = $_POST['id'];
	$vak = $_POST['vak'];
	$richting = $_POST['richting'];
	$docent = $_POST['docent'];
	if (empty($vak) || empty($richting) || empty($docent)) {
		echo 'errorEmpty';
	} else {
		$sql = "UPDATE vakken SET Vaknaam=?, Vak_richting=?, Vak_docent=? WHERE vak_ID=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			echo "sqlError";
		} else {
			mysqli_stmt_bind_param($stmt, "siii", $vak, $richting, $docent, $id);
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
	$sql = "DELETE FROM vakken WHERE vak_ID=? ";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo "sqlError";
	} else {
		mysqli_stmt_bind_param($stmt, "i", $id);
		mysqli_stmt_execute($stmt);
		echo "success";
	}
}
