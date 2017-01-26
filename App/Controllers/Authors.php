<?php 

namespace App\Controllers;

use Core\View;
use Core\Form;
use Core\Session;
use App\Models\User;
use App\Models\Author;


class Authors extends \Core\Controller {
	
	public function indexAction() {
		//
		$authors = Author::find_all();
		View::render('Authors/index.php', ["authors" => $authors] );
	}

	public function addNewAction() {
		// message("Hello from Controller: " . get_class($this) . ", Action: addNew()", "success");
		
		// $form = new Form("Post", ["name" , "details"]);
		// $form->action = "add-new";
		// $form->method = "post";

		// if(isset($_POST['submit'])) {
		// 	$post = $form->parsePost($_POST, true); // get post from parsed $_POST
		// 	if($post->create()) {
		// 		Session::message( ["New Post Created" , "success"]);
		// 		redirect_to('index');
		// 	} else {
		// 		// exception is thrown
		// 	}
		// } 
		// // render view
		// View::render('Posts/add-new.php', [ "form" => $form ] );
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
			redirect_to('/users/login');
		}
	}

	protected function after() {
	}

}

?>