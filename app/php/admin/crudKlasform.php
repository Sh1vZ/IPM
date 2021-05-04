<?php
include(dirname(__FILE__) . "/../conn.php");

if (isset($_POST['delete'])) {
	$id = $_POST['id'];
	$sql = "DELETE FROM studentklas WHERE st_klas_ID=? ";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo "sqlError";
	} else {
		mysqli_stmt_bind_param($stmt, "i", $id);
		mysqli_stmt_execute($stmt);
		echo "success";
	}
}
if (isset($_POST["insert"])) {
	
		$Naam = $_POST['Naam'];
		$Klas = $_POST['Klas'];
		if (empty($Naam) || empty($Klas)) {
			echo 'errorEmpty';
		} else {
			$sql = "SELECT StudentID FROM studentklas WHERE StudentID= ?";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				echo "sqlError";
			} else {
				mysqli_stmt_bind_param($stmt, "i", $Naam);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$resultcheck = mysqli_stmt_num_rows($stmt);
				if ($resultcheck > 0) {
					echo "exist";
				} else {
					$sql = "INSERT INTO studentklas(StudentID,KlasID) VALUES(?,?)";
					$stmt = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo "sqlError";
					} else {
						mysqli_stmt_bind_param($stmt, "ii", $Naam, $Klas);
						mysqli_stmt_execute($stmt);
						echo "success";
					}
				}
			}
		}
	}

?>