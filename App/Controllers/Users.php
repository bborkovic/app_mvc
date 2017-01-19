<?php 

namespace App\Controllers;

use Core\View;
use Core\Form;
use App\Models\User;



class Users extends \Core\Controller {
	
	public function login() {
		global $session;
		message("Hello from Controller: " . get_class($this) . ", Action: login()", "success");
		$message = "";
		if( isset($_POST['submit'])) {

			$username = htmlspecialchars( $_POST['username'] );
			$password = htmlspecialchars( $_POST['password'] );

			$found_user = User::authenticate( $username, $password );
			if($found_user) {
				$session->login($found_user);
				// echo "You are logged in";
				redirect_to('/' . $session->get_latest_url());
			} else {
				$message = "Username/Password combination not corrent";
			}

		} 
		$form = new Form("User", ["username", "password"]);
		$form->action = "login";
		$form->method = "post";
		View::render('Users/login.php', ["form" => $form , "message" => $message] );

	}

	public function logout() {
		global $session;
		message("Hello from Controller: " . get_class($this) . ", Action: logout()", "success");
		$session->logout();
		message("Logout complete");
	}



	protected function after() {
	}

	protected function before() {
	}

}

?>