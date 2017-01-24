<?php
error_reporting(E_ALL ^ E_DEPRECATED);
ini_set('display_errors', 1);

spl_autoload_register( function($class) {
	$root = dirname(__DIR__); // get the parent directory
	$file = $root . '/' . str_replace('\\','/', $class) . '.php'; // get php file of class
	if( is_readable($file)) {
		require $file;
	}
	// add the Vendor Folder to autoload
	// works if class name = name of php file
	$file = $root . '/' . 'Vendor/' . str_replace('\\','/', $class) . '.php';
	if( is_readable($file)) {
		require $file;
	}
});

use Imagine\Image\Box;
use Imagine\Image\Point;
// use Imagine\Gd\Imagine;

$box = new Imagine\Image\Box();



// $imagine = new Imagine();
// $image = $imagine->open('uploads/25.jpg');

// $image->resize(new Box(200, 200))
// 		->rotate(45)
// 		->crop(new Point(0, 0), new Box(200, 200))
// 		->save('uploads/26.jpg');

// $router = new Core\Router();

// $imag
		
echo "End of page";

?>