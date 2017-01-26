<?php 

	require_once 'functions.php';

	spl_autoload_register( function($class) {
		$root = dirname(__DIR__); // get the parent directory
		$file = $root . '/' . str_replace('\\','/', $class) . '.php'; // get php file of class
		if( is_readable($file)) {
			require $file;
			// require $root . '/' . str_replace('\\','/', $class) . '.php';
		}
	});






?>