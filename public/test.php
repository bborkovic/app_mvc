<?php

	error_reporting(E_ALL ^ E_DEPRECATED);
	ini_set('display_errors', 1);

	require_once '../Core/initialize.php';

	set_error_handler('Core\Error::errorHandler');
	set_exception_handler('Core\Error::exceptionHandler');

	use App\Models\Book;
	$book = Book::find_by_id(2);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>



</body>
</html>


