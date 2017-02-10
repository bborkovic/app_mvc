<?php 

namespace App\Models;

use Core\Model;

class Book extends Model {
	
	// table the class is related
	public static $table_name = "books";
	public static $db_fields = array('id', 'author_id', 'name', 'short_info', 'about_book', 'about_authors' , 'book_photo');
	public static $primary_keys = array('id', 'author_id');
	
	public $validations = array(
		"author_id" => array(
			"type" => "drop",
			"label" => "Author Name",
			),
		"name" => array(
			"type" => "text",
			"label" => "Book Name",
			),
		"short_info" => array(
			"type" => "text",
			"label" => "Short Info",
			),
		"about_book" => array(
			"type" => "text",
			"label" => "About Book",
			),
		"about_book" => array(
			"type" => "text",
			"label" => "About Book",
			),
		"about_authors" => array(
			"type" => "text",
			"label" => "About Author",
			),
		"book_photo" => array(
			"type" => "text",
			"label" => "Book Photo",
			),
	);

	public $children = [
		// 'Book' => 
		// 	['table_name' => 'books', 'foreign_key' => 'author_id'],
		];

	public $parents = [		
		'Author' => 
			['table_name' => 'authors', 'foreign_key' => 'author_id'],
		];

	// fields
	public $id;
	public $author_id;
	public $name;
	public $short_info;
	public $about_book;
	public $about_author;
	public $book_photo;



} // End of Class


?>