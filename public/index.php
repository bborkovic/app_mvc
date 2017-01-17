<?php

	require '../Core/router.php';

	// // echo "Requested URL:" . "<br/>";
	// // echo '"' . $_SERVER['QUERY_STRING'] . '"';

	$router = new Router();
	
	$url = $_SERVER['QUERY_STRING'];
	echo $url . "<br/>";

	$router->add('{controller}/{action}');
	$router->add('admin/{controller}/{action}');
	$router->add('{controller}/{id:\d+}/{action}');
	$routes = $router->getRoutes();

	// foreach ($routes as $regex => $params) {
	// 	echo "<br/>" . "***" . htmlspecialchars($regex) . "***";
	// }


	if($router->match($url)) {
		echo "Match found";
		echo "<pre>";
		var_dump($router->getParams());
		echo "</pre>";
	} else {
		echo "No route found for URL {$url}";
	}

?>


