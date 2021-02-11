<?php

function Generate($anaam,$vnaam,$datum,$email){
  // GENERATE IMAGE
  $image = imagecreate(500, 300);
  $background_color = imagecolorallocate($image, 0, 153, 0);
  $text_color = imagecolorallocate($image, 255, 255, 255);
  imagestring($image, 10, 10, 10, "NATIN-MBO", $text_color);
  imagestring($image, 5, 30, 100, "Naam: $anaam $vnaam", $text_color);
  imagestring($image, 5, 30, 120, "Geboortedatum: $datum", $text_color);
  imagestring($image, 5, 30, 140, "Email: $email", $text_color);
  //SAVE FILE NAME
  $name = $anaam . "_" . $vnaam . "_" . rand(1000, 1000000);
  //SAVE LOCATION
  $save = "../uploads/studentenkaarten/" . $name . ".png";
  //SAVE IMAGE
  if(imagepng($image, $save)){
    return $name;
  }else{
    return 'errorImageGeneration';
  }
}