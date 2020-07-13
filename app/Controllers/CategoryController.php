<?php
namespace App\Controllers;	
use App\Models\Categories;

class CategoryController {
	//body of controller

	public function index(){
		$object = Categories::getObject();
		$all_categories = $object->findAll();
		print_r($all_categories);
	}

	public function api_show(){
		$object = Categories::getObject();
		$categories = $object->findAll();
		$categories = json_decode(json_encode($categories),true);
		echo json_encode($categories);
	}
}