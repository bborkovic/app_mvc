<?php 

namespace App\Controllers;

use Core\View;
use Core\Form;
use App\Models\Post;
use App\Models\User;



class Posts extends \Core\Controller {
	
	public function indexAction() {
		$posts = Post::find_all();
		View::render('Posts/index.php', [ "posts" => $posts , "link" => "add-new"] );
	}

	public function addNewAction() {
		// message("Hello from Controller: " . get_class($this) . ", Action: addNew()", "success");
		
		$form = new Form("Post", ["name" , "details"]);
		$form->action = "add-new";
		$form->method = "post";

		if(isset($_POST['submit'])) {
			$post = $form->parsePost($_POST, true); // get post from parsed $_POST
			if($post->create()) {
				redirect_to('index');
			} else {
				echo "Error saving! " . $error->get_errors();
			}
		} 
		// render view
		View::render('Posts/add-new.php', [ "form" => $form ] );
	}

	public function editAction() {

		$post = Post::find_by_id( $this->route_params['id'] );
		$form = new Form($post, ["name" , "details"]);
		$form->action = "edit";
		$form->method = "post";


		if(isset($_POST['submit'])) {
			$post = $form->parsePost($_POST, true);
			// var_dump($form);
			// Save user to DB and display message if necessary
			if($post->update()) {
				echo "Post saved! ";
			} else {
				echo "Error saving! " . $error->get_errors();
			}
		} 

		View::render('Posts/edit.php', [ "form" => $form ] );
	}

	public function deleteAction() {

		$post = Post::find_by_id( $this->route_params['id'] );
		if($post->delete()) {
			echo "Post deleted!";
			redirect_to('/posts/index');
		} else {
			echo "Error saving! " . $error->get_errors();
		}
	}


	protected function before() {
		global $session;
		if( !$session->is_logged_in() and $this->route_params['action'] != 'index'){
			$session->message = 
			redirect_to('/users/login');
		}
	}

	protected function after() {
	}

}

?>