<?php

namespace App\Controllers;
use App\Models\User;

class UserController{

	public function index(){
		$object = new User();
		$users = $object->findAll();
		print_r($users);
	}

	public function show($id){
		$object = new User();
		$articles = $object->findById($id);

		print_r($articles);
	}

	public function create(){
		echo $id1;
		echo "<br>";
		echo $id2;
	}
}