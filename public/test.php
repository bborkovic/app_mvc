<?php

	error_reporting(E_ALL ^ E_DEPRECATED);
	ini_set('display_errors', 1);

	require_once '../Core/initialize.php';

	set_error_handler('Core\Error::errorHandler');
	set_exception_handler('Core\Error::exceptionHandler');

	use App\Models\User;
	$user = User::find_by_id(1);

	$ads = $user->get_children("Ad");

	foreach ($ads as $ad) {
		echo "<br/>" . $ad->title;
	}

	// $ads = $user->get_children("Ad");

	// echo count($ads);

	echo "<br/>" . " End of script";
	

?>


