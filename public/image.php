<?php
error_reporting(E_ALL ^ E_DEPRECATED);
ini_set('display_errors', 1);

if(extension_loaded('gd')) {
	echo "<pre>";
	print_r(gd_info());
	echo "</pre>";
}
else {
	echo 'GD is not available.';
}

if(extension_loaded('imagick')) {
	$imagick = new Imagick();
	print_r($imagick->queryFormats());
}
else {
	echo 'ImageMagick is not available.';
}

?>