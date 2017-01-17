<?php
	# Enable Error reporting
	error_reporting(E_ALL ^ E_DEPRECATED);
	// error_reporting(E_ALL);
	ini_set('display_errors', 1);

	# Instantiate DB class
	require_once '../Core/functions.php';

	spl_autoload_register( function($class) {
		$root = dirname(__DIR__); // get the parent directory
		$file = $root . '/' . str_replace('\\','/', $class) . '.php'; // get php file of class
		if( is_readable($file)) {
			require $file;
			// require $root . '/' . str_replace('\\','/', $class) . '.php';
		}
	});

	$database = new Core\Database();
	$router = new Core\Router();


	$url = $_SERVER['QUERY_STRING'];

	$router->add('{controller}/{action}');
	$router->add('{controller}/{id:\d+}/{action}');
	$router->add('admin/{controller}/{action}', ['namespace'=>'Admin'] );

	# !! Run controllers that are needed
	$router->dispatch($url);

	echo "<hr>URL:<br/>$url";


?>


