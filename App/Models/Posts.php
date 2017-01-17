<?php 

namespace App\Models;

use Core\DatabaseObject as DatabaseObject;

class Posts extends DatabaseObject {
	
	// table the class is related
	public static $table_name = "posts";
	public static $db_fields = array('id','name','details');
	public static $primary_keys = array('id');
	// columns of table users
	
	public $children = array(
		'Ad' => array( // Class Name
			'table_name' => 'ads',
			'foreign_key' => 'user_id'
			),
		'children2' => array( // This is class Name
			'table_name' => 'table_name',
			'foreign_key' => 'key_name'
			)
		);

	public $parents = array(
		);

	public $id;
	public $name;
	public $details;



} // End of Class


?>