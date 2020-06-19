<?php
namespace App\Controllers;
use App\Models\Author;	

class AuthorController {

	public function index(){

		$object = Author::getObject();
 		$authors = $object->findAll();
 		foreach ($authors as $author) {
 			echo $author->author."<br>";
 		}

	}

	public function create(){
 		$new_author = new Author();
 		$new_author->author = "Leo";
 		$new_author->alias= 'Messi';
 		$new_author->create();

	}

	public function show(){
 	//body of show
	}

	public function insert(){
 	//body of insert
	}


}