<?php

	error_reporting(E_ALL ^ E_DEPRECATED);
	ini_set('display_errors', 1);

	require_once '../Core/initialize.php';

	Core\Session::session_start();

	set_error_handler('Core\Error::errorHandler');
	set_exception_handler('Core\Error::exceptionHandler');

	$arr = ["search" => "the", "search2" => "end"];
	foreach( $arr as $k => $v) {
		// echo "&" . $k . '=' . $v;
	}

	$data = array('jedan'=>'JEDAN',
              'dva'=>'DVA',
              );

	echo http_build_query($data) . "<br/>";
	unset($data['jedan']);
	echo http_build_query($data) . "<br/>";

	// echo http_build_query($data, '', '&amp;');


	echo "<br/>";

 ?>



