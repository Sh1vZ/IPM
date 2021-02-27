<?php
include("conn.php");

if (isset($_POST['delete'])) {
	$id = $_POST['id'];
	$sql = "DELETE FROM template WHERE temp_ID=? ";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo "sqlError";
	} else {
		mysqli_stmt_bind_param($stmt, "i", $id);
		mysqli_stmt_execute($stmt);
		echo "success";
	}
}
?>