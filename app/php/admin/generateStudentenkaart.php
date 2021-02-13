<?php

use Endroid\QrCode\QrCode;

function Generate($anaam, $vnaam, $datum, $email,$imgname)
{
  // GENERATE IMAGE
  $image = imagecreate(500, 200);
  $background_color = imagecolorallocate($image, 0, 153, 0);
  $text_color = imagecolorallocate($image, 255, 255, 255);
  $image2 = imagecreatefrompng("../../uploads/qrcodes/" . $imgname . ".png");
  imagestring($image, 10, 10, 10, "NATIN-MBO", $text_color);
  imagestring($image, 5, 30, 70, "Naam: $anaam $vnaam", $text_color);
  imagestring($image, 5, 30, 90, "Geboortedatum: $datum", $text_color);
  imagestring($image, 5, 30, 110, "Email: $email", $text_color);
  imagecopymerge($image, $image2, 320, 40, 0, 0, 120, 120, 100);
  //SAVE FILE NAME
  $name = $anaam . "_" . $vnaam . "_" . rand(1000, 1000000);
  //SAVE LOCATION
  $save = "../../uploads/studentenkaarten/" . $name . ".png";
  //SAVE IMAGE
  if (imagepng($image, $save)) {
    if (unlink("../../uploads/qrcodes/" . $imgname . ".png")) {
      return $name;
    } else {
      echo 'ImageError';
    }
  } else {
    return 'errorImageGeneration';
  }
}

function generateQrcode($anaam, $vnaam, $pin)
{
  $qrCode = new QrCode("|$anaam|$pin|");
  $qrCode->setSize(100);
  $qrCode->setMargin(10);
  $qrCode->setForegroundColor(['r' => 128, 'g' => 0, 'b' => 128, 'a' => 0.9]);
  $qrCode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
  $qrCode->setRoundBlockSize(true, QrCode::ROUND_BLOCK_SIZE_MODE_ENLARGE);
  $name = $anaam . "_" . $vnaam . "_" . rand(1000, 1000000);
  $qrCode->writeFile("../../uploads/qrcodes/" . $name . ".png");
  return $name;
}
