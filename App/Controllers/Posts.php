<?php 

namespace App\Controllers;

class Posts extends \Core\Controller {
	
	public function indexAction() {
		message("<br/>Hello from Controller: " . get_class($this) . ", Action: index()<br/>", "success");
		// echo "<pre>" . htmlspecialchars( print_r($this->route_params, true)) . "</pre>";
	}

	public function addNewAction() {
		message("Hello from Controller: " . get_class($this) . ", Action: addNew()", "success");
	}

	protected function after() {
		echo "(after)";
	}

	protected function before() {
		echo "(before)";
	}

}

?>