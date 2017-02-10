<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	ini_set('display_errors', 1);

	require_once '../Core/initialize.php';

	// set_error_handler('Core\Error::errorHandler');
	// set_exception_handler('Core\Error::exceptionHandler');

 //    use Core\Form;
 //    use Core\Util;
 //    use Core\Paginator;
    // use App\Models\Book;

?>


<?php 

	use App\Models\Author;
	use App\Admin\Controllers\Authors;
	$authors = Author::find_all();

	if ( class_exists('App\Admin\Controllers\Authors')) {
		echo "<br/>" . "class Authors exists";
	} else {
		echo "<br/>" . "class Authors not exists";
	}

	// $controller_object = new Authors();
	// $controller_object->test();



	echo "End of script";

 ?>



