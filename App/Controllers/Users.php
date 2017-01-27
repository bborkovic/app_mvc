<?php 

namespace App\Controllers;

use Core\View;
use Core\Form;
use Core\Session;
use App\Models\User;



class Users extends \Core\Controller {
	
	public function login() {
		global $session;
		// message("Hello from Controller: " . get_class($this) . ", Action: login()", "success");
		$message = "";
		if( isset($_POST['submit'])) {

			$username = htmlspecialchars( $_POST['username'] );
			$password = htmlspecialchars( $_POST['password'] );

			$found_user = User::authenticate( $username, $password );
			if($found_user) {
				Session::login($found_user);
				// echo "You are logged in";
				redirect_to('/' . Session::get_latest_url_not_like('logout'));
			} else {
				$message = "Username/Password combination not corrent";
			}

		} 
		$form = new Form("User", ["username", "password"]);
		$form->action = "login";
		View::render('Users/login.php', ["form" => $form , "message" => $message] );
	}

	public function logout() {
		Session::message(["Logout Complete" , "success"]);
		Session::logout();
		redirect_to( '/' . Session::get_latest_url() );
	}


	protected function after() {
	}

	protected function before() {
	}

}

?>