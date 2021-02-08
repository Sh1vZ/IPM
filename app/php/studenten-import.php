<?php
include 'conn.php';
include '../uploads/img-generate.php';
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
		$image = imagecreate(500, 300);
		$background_color = imagecolorallocate($image, 0, 153, 0);
		$text_color = imagecolorallocate($image, 255, 255, 255);
		imagestring($image, 10, 10, 10,"NATIN-MBO", $text_color);
		imagestring($image, 5, 30, 100,"Naam: $data[0] $data[1]", $text_color);
		imagestring($image, 5, 30, 120,"Geboortedatum: $data[2]", $text_color);
		imagestring($image, 5, 30, 140,"Email: $data[4]", $text_color);
		
		$name=$data[0]."_".$data[1]."_".rand(1000, 1000000);
		$save="../uploads/studentenkaarten/".$name.".png";
		imagepng($image,$save);


		$sql = "INSERT INTO studenten (Achternaam,Voornaam,Geboortedatum,Geboorteplaats,Student_email,Student_pincode,Saldo,img) VALUES(?,?,?,?,?,?,?,?)";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			echo "sqlError";
		} else {
			mysqli_stmt_bind_param($stmt, "ssssssss", $data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6],$name);
			mysqli_stmt_execute($stmt);
			unlink("../uploads/" . $_FILES['data']['name']);
			echo "success";
		}
	} else {
		$isheader = 1;
		$data = [];
	}
}
