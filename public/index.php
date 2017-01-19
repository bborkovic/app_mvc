<?php

	error_reporting(E_ALL ^ E_DEPRECATED);
	ini_set('display_errors', 1);

	# Instantiate DB class
	require_once '../Core/functions.php';
	require_once '../Core/Session.php';

	spl_autoload_register( function($class) {
		$root = dirname(__DIR__); // get the parent directory
		$file = $root . '/' . str_replace('\\','/', $class) . '.php'; // get php file of class
		if( is_readable($file)) {
			require $file;
			// require $root . '/' . str_replace('\\','/', $class) . '.php';
		}
	});

	set_error_handler('Core\Error::errorHandler');
	set_exception_handler('Core\Error::exceptionHandler');

	// $session = new Core\Session();
	$router = new Core\Router();
	$url = $_SERVER['QUERY_STRING'];

	$router->add('{controller}/{action}');
	$router->add('{controller}/{id:\d+}/{action}');
	$router->add('admin/{controller}/{action}', ['namespace'=>'Admin'] );

	# !! Run controllers that are needed
	$router->dispatch($url);

	echo "<hr/>";
	echo "Current url: " . $session->get_current_url();
	echo "<br/>";
	echo "Latest url: " . $session->get_latest_url();

?>


