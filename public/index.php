<?php
	# Enable Error reporting
	error_reporting(E_ALL ^ E_DEPRECATED);
	// error_reporting(E_ALL);
	ini_set('display_errors', 1);

	require '../Core/functions.php';
	// require '../Core/Router.php';
	// require '../App/Controllers/Posts.php';


	spl_autoload_register( function($class) {
		$root = dirname(__DIR__); // get the parent directory
		$file = $root . '/' . str_replace('\\','/', $class) . '.php'; // get php file of class
		if( is_readable($file)) {
			require $file;
			// require $root . '/' . str_replace('\\','/', $class) . '.php';
		}
	});

	$router = new Core\Router();


	$url = $_SERVER['QUERY_STRING'];
	echo $url . "<br/>";

	$router->add('{controller}/{action}');
	$router->add('{controller}/{id:\d+}/{action}');
	$router->add('admin/{controller}/{action}', ['namespace'=>'Admin'] );

	# !! Run controllers that are needed
	$router->dispatch($url);

	// print_r($router->getParams());

	// foreach ($router->getRoutes() as $regex => $params) {
	// 	echo "<br/>" . "***" . htmlspecialchars($regex) . "***";
	// }
	// echo "<br/>";


	// if($router->match($url)) {
	// 	echo "Match found";
	// 	echo "<pre>";
	// 	print_r($router->getParams());
	// 	echo "</pre>";
	// } else {
	// 	echo "No route found for URL {$url}";
	// }

?>


