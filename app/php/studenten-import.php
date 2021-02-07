<?php
include 'conn.php';

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

require "../../vendor/autoload.php";
$file = $_FILES['data']['tmp_name'];
$targetPath = '../uploads/' . $_FILES['data']['name'];
move_uploaded_file($file, $targetPath);
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

$spreadSheet = $reader->load($targetPath);
$excelSheet = $spreadSheet->getActiveSheet();
$spreadSheetAry = $excelSheet->toArray();
$sheetCount = count($spreadSheetAry);

$isheader = 0;
$i = 0;
foreach ($excelSheet->getRowIterator() as $row) {
	$a = $i++;
	if ($isheader > 0) {
		$cellIterator = $row->getCellIterator();
		$cellIterator->setIterateOnlyExistingCells(false);
		$data = [];
		foreach ($cellIterator as $cell) {
			$data[] = $cell->getValue();
		}
		$sql = "INSERT INTO studenten (Achternaam,Voornaam,Geboortedatum,Geboorteplaats,Student_email,Student_pincode,Saldo) VALUES(?,?,?,?,?,?,?)";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			echo "sqlError";
		} else {
			mysqli_stmt_bind_param($stmt, "sssssss", $data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6]);
			mysqli_stmt_execute($stmt);
			unlink("../uploads/" . $_FILES['data']['name']);
			echo "success";
		}
	} else {
		$isheader = 1;
		$data = [];
	}
}
