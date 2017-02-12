<?php

	error_reporting(E_ALL ^ E_DEPRECATED);
	ini_set('display_errors', 1);

	require_once '../Core/initialize.php';

	Core\Session::session_start();

	set_error_handler('Core\Error::errorHandler');
	set_exception_handler('Core\Error::exceptionHandler');

	use Core\Database;
	$db = new Database();

	$ret = $db->query_select("select * from v_posts");

	$columns = array_keys( reset($ret) );

	foreach ($columns as $column) {
		echo $column . " ";
	}

	echo "<br/>";

 ?>



