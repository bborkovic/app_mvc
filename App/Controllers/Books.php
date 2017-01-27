<?php 

namespace App\Controllers;

use Core\View;
use Core\Form;
use Core\Util;
use Core\Session;
use App\Models\User;
use App\Models\Book;
use App\Models\Author;
use Core\Paginator;

class Books extends \Core\Controller {
	
	public function indexAction() {
		$page = ( isset($this->route_params['page'])) ? $this->route_params['page'] : 1;
		$paginator = new Paginator($page, 12, 7);
		$books = array_chunk( $paginator->getModelData("Book") , 4 );
		View::render('Books/index.php', [ 
				"books" => $books,
				"add_links" => ["Add new Book" => '/books/add-new']
			]);
	}

	public function show() {
		$book = Book::find_by_id( $this->route_params['id'] );
		View::render('Books/show.php', ["book" => $book] );
	}

	public function addNewAction() {
		
		$authors = Author::find_all();
		$authors_hash = Util::obj2hash( $authors , "id", "getFullName");

		$form = new Form("Book", [ "author_id", "name", "short_info", "about_book", "about_authors" ]);
		$form->action = "add-new";
		$form->setFieldsSelect( "author_id" , $authors_hash );

		if(isset($_POST['submit'])) {
			$post = $form->parsePost($_POST, true); // get post from parsed $_POST
			if($post->create()) {
				Session::message( ["New Book Created" , "success"]);
				redirect_to('/books/index');
			} else {
				// exception is thrown
			}
		} 
		// render view
		View::render('Books/add-new.php', [ 
				"form" => $form,
				"add_links" => []
			]);
	}

	public function editAction() {
		// global $session;
		// $post = Post::find_by_id( $this->route_params['id'] );
		// $form = new Form($post, ["name" , "details"]);
		// $form->action = "edit";
		// $form->method = "post";

		// if(isset($_POST['submit'])) {
		// 	$post = $form->parsePost($_POST, true);

		// 	if( $form->has_validation_errors() ){
		// 		Session::message(["Validation errors!" , "info"]);
		// 	} else {
		// 		if($post->update()) {
		// 			Session::message(["Post saved!" , "success"]);
		// 		} 
		// 	}
		// }
		// View::render('Posts/edit.php', [ "form" => $form ] );
	}

	public function deleteAction() {
		// $post = Post::find_by_id( $this->route_params['id'] );
		// if($post->delete()) {
		// 	Session::message(["Post <strong>$post->name</strong> deleted!" , "success"]);
		// 	redirect_to('/posts/index');
		// } else {
		// 	Session::message(["Error saving! " . $error->get_errors() , "success"]);
		// }
	}

	protected function before() {
		if( !Session::is_logged_in() and $this->route_params['action'] != 'index'){
			Session::message( [ "You have login for this action!", "warning" ] );
			redirect_to('/users/login');
		}
	}

	protected function after() {
	}

}

?>