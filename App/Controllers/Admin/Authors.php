<?php 

namespace App\Controllers\Admin;

use Core\View;
use Core\Form;
use Core\Util;
use Core\Session;
use App\Models\User;
use App\Models\Author;


class Authors extends \Core\Controller {
	
	public function indexAction() {
		//
		// echo "Hello from Namespace: Admin, Controller: Authors, Action: index";

		$authors = Author::find_all();
		View::renderTemplate('Admin/Authors/index.html' , array(
			"authors" => $authors,
			"messages" => Util::get_default_messages( array("page_title" => "Admin/Authors")),
			)
		);
	}

	public function addNewAction() {
		
		$form = new Form("Author", ["first_name" , "last_name"]);

		if(isset($_POST['submit'])) {
			$author = $form->parsePost($_POST, true); // get post from parsed $_POST
			
			if( $form->has_validation_errors() ){
				Session::message(["Validation errors!" , "error"]);
			} else {
				if($author->create()) {
					Session::message(["Post saved!" , "success"]);
					redirect_to('index');
				} else {
					// Exception will be thrown
				}
			}
		} 
		// // render view
		View::renderTemplate('Admin/Authors/new.html', array(
			"form" => $form,
			"messages" => Util::get_default_messages( array("page_title" => "Admin/Authors") ),
			) 
		);
	}

	public function editAction() {

		$author = Author::find_by_id( $this->route_params['id'] );
		$form = new Form($author, ["first_name" , "last_name"]);
		
		if(isset($_POST['submit'])) {
			$post = $form->parsePost($_POST, true);

			if( $form->has_validation_errors() ){
				Session::message(["Validation errors!" , "error"]);
			} else {
				if($post->update()) {
					Session::message(["Post saved!" , "success"]);
				}
			}
		}

		View::renderTemplate('Admin/Authors/edit.html', array(
			"form" => $form,
			"messages" => Util::get_default_messages( array("page_title" => "Admin/Authors") ),
			) 
		);
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
		if( !Session::is_logged_in()){
			redirect_to('/users/login');
		}
	}

	protected function after() {
	}

}

?>