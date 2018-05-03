<?php
// Let's create a re-usable function to resize images

function resizeImage($file, $folder, $newwidth){
	list($width, $height) = getimagesize($file);

	$imgRatio = $width/$height;

	$newheight = $newwidth/$imgRatio;
	// echo "$width | $height | $imgRatio<br>";

	ini_set ('gd.jpeg_ignore_warning', 1);
	$thumb = imagecreatetruecolor($newwidth, $newheight);
	$source = imagecreatefromjpeg($file);

	imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

	$newimage_file = $folder . $_FILES['myfile']['name'];

	imagejpeg($thumb, $newimage_file, 80);
	imagedestroy($thumb);
	imagedestroy($source);
}

 ?>
<?php
function resizeImagePNG($file, $folder, $newwidth){
	list($width, $height) = getimagesize($file);

	$imgRatio = $width/$height;

	$newheight = $newwidth/$imgRatio;
	// echo "$width | $height | $imgRatio<br>";

	ini_set ('gd.png_ignore_warning', 1);
	$thumb = imagecreatetruecolor($newwidth, $newheight);
	$source = imagecreatefrompng($file);

	imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

	$newimage_file = $folder . $_FILES['myfile']['name'];

	imagepng($thumb, $newimage_file, 8);
	imagedestroy($thumb);
	imagedestroy($source);
}
  ?>
<?php
// this is to crop and resize thumbnail images so it crops the center out and makes the width and height the same
function createSquareImageCopy($file, $folder, $newWidth){
	
	//echo "$image_file, $folder, $newWidth";
	//exit();

	$thumb_width = $newWidth;
	$thumb_height = $newWidth;// tweak this for ratio

	list($width, $height) = getimagesize($file);

	$original_aspect = $width / $height;
	$thumb_aspect = $thumb_width / $thumb_height;

	if($original_aspect >= $thumb_aspect) {
	   // If image is wider than thumbnail (in aspect ratio sense)
	   $new_height = $thumb_height;
	   $new_width = $width / ($height / $thumb_height);
	} else {
	   // If the thumbnail is wider than the image
	   $new_width = $thumb_width;
	   $new_height = $height / ($width / $thumb_width);
	}

	ini_set ('gd.jpeg_ignore_warning', 1);
	$source = imagecreatefromjpeg($file);
	$thumb = imagecreatetruecolor($thumb_width, $thumb_height);

	// Resize and crop
	imagecopyresampled($thumb,
					   $source,0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
					   0 - ($new_height - $thumb_height) / 2, // Center the image vertically
					   0, 0,
					   $new_width, $new_height,
					   $width, $height);
	
	$newimage_file = $folder. "/" .basename($file);
	imagejpeg($thumb, $newimage_file, 80);
}
?>
<?php
// this is to crop and resize thumbnail images so it crops the center out and makes the width and height the same
function createSquareImageCopyPNG($file, $folder, $newWidth){
	
	//echo "$image_file, $folder, $newWidth";
	//exit();

	$thumb_width = $newWidth;
	$thumb_height = $newWidth;// tweak this for ratio

	list($width, $height) = getimagesize($file);

	$original_aspect = $width / $height;
	$thumb_aspect = $thumb_width / $thumb_height;

	if($original_aspect >= $thumb_aspect) {
	   // If image is wider than thumbnail (in aspect ratio sense)
	   $new_height = $thumb_height;
	   $new_width = $width / ($height / $thumb_height);
	} else {
	   // If the thumbnail is wider than the image
	   $new_width = $thumb_width;
	   $new_height = $height / ($width / $thumb_width);
	}

	ini_set ('gd.png_ignore_warning', 1);
	$source = imagecreatefrompng($file);
	$thumb = imagecreatetruecolor($thumb_width, $thumb_height);

	// Resize and crop
	imagecopyresampled($thumb,
					   $source,0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
					   0 - ($new_height - $thumb_height) / 2, // Center the image vertically
					   0, 0,
					   $new_width, $new_height,
					   $width, $height);
	
	$newimage_file = $folder. "/" .basename($file);
	imagepng($thumb, $newimage_file, 8);
}
?>