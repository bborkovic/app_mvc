<?php 

namespace App\Controllers;

use Core\View;
use App\Models\Posts as PostsModel;

class Posts extends \Core\Controller {
	
	public function indexAction() {
		message("<br/>Hello from Controller: " . get_class($this) . ", Action: index()<br/>", "success");
		echo "<pre>" . htmlspecialchars( print_r($this->route_params, true)) . "</pre>";
		// echo "<pre>" . htmlspecialchars( print_r($_GET)) . "</pre>";

		$posts = PostsModel::find_all();

		View::render('Posts/index.php' 
				, [ "posts" => $posts ]);

	}

	public function addNewAction() {
		message("Hello from Controller: " . get_class($this) . ", Action: addNew()", "success");
	}

	protected function after() {
	}

	protected function before() {
	}

}

?>