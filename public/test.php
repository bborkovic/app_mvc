<?php

	error_reporting(E_ALL ^ E_DEPRECATED);
	ini_set('display_errors', 1);

	require_once '../Core/initialize.php';

	set_error_handler('Core\Error::errorHandler');
	set_exception_handler('Core\Error::exceptionHandler');

    use Core\Form;
    use Core\Util;
    use App\Models\Book;
    use App\Models\Author;


	if( isset($_POST['submit'])) {
		echo "<pre>";
		print_r($_POST);
        echo "</pre>";
	}

    $authors = Author::find_all();
    $authors_hash = Util::obj2hash( $authors , "id", "getFullName");

    $book = Book::find_by_id(2);
    $form = new Form( $book, [ "author_id", "name", "short_info"] );
    $form->action = 'test.php';
    $form->setFieldsSelect( "author_id" , $authors_hash );


?>


<?php require 'layouts/header.php'; ?>

    <div class="row">

        <div class="col-md-4"></div>

        <div class="col-md-4">
            <?php $form->render(); ?>
        </div>

        <div class="col-md-4"></div>

    </div>



<?php require 'layouts/footer.php'; ?>










<!--<form role="form" action="test.php" method="post"-->
<!-- 	<label for="sel1">Select Author:</label>
	<select class="form-control" id="sel1" name="author_id">
		<option value="1">Volvo</option>
		<option value="2">Saab</option>
		<option value="3">Mercedes</option>
		<option value="4">Audi</option>	
	</select> -->
<!--	<button type="submit" class="btn btn-default" name="submit" value="Upload">Save</button>-->
<!--</form>-->




