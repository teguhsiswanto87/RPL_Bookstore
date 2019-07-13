<?php
 function UploadImage($fupload_name){
 	//setting folder & image 
 	$folder = "../../../books_image/";
 	//file that upload
 	$file_upload = $folder . $fupload_name;

 	// save image size ORIGINAL
 	move_uploaded_file($_FILES["fupload"]["tmp_name"], $file_upload);

 	//identity file ORI
 	$gbr_asli = imagecreatefromjpeg($file_upload);
 	$lebar = imageSX($gbr_asli);
 	$tinggi = imageSY($gbr_asli);

 	//save thumbnail version (380 pixel)
 	$thumb_lebar = 233;
 	$thumb_tinggi = 233;

 	//proccess for resize dimension (pixel)
 	$gbr_thumb = imagecreatetruecolor($thumb_lebar, $thumb_tinggi);
 	imagecopyresampled($gbr_thumb, $gbr_asli, 0, 0, 0, 0, $thumb_lebar, $thumb_tinggi, $lebar, $tinggi);

 	//save thumbnail image
 	imagejpeg($gbr_thumb, $folder .  $fupload_name);

 	//delete image from computer storage
 	imagedestroy($gbr_asli);
 	imagedestroy($gbr_thumb);
 }

?>