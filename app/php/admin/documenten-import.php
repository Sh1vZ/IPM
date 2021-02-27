<?Php
include '../conn.php';

if (isset($_POST["insert"])) {
	//insert
		$path = $_POST['naam'];
		$naam = $_POST['path'];

		if (empty($path) || empty($naam)) {
			echo 'errorEmpty';
		} else {
			
					$sql = "INSERT INTO documenten(Path, naam) VALUES(?,?)";
					$stmt = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt, $sql)) {
						echo "sqlError";
					} else {
						mysqli_stmt_bind_param($stmt, "ss", $path, $naam);
						mysqli_stmt_execute($stmt);
						echo "success";
					}
				}
			}
		