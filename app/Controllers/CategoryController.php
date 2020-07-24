<?php
namespace App\Controllers;	
use App\Models\Categories;
use App\Views\View;

class CategoryController {
	//body of controller

	public function index(){
		$template = "categories/index";

		View::view($template,null);
	}

	public function api_show(){
		$object = Categories::getObject();
		$categories = $object->findAll()->get();
		$categories = json_decode(json_encode($categories),true);
		echo json_encode($categories);
	}

	public function delete($id){

		$category = Categories::getObject();
		if($category->delete($id))
			return 'Category was deleted successfully';
		else 
			return 'Error in deleting category';

	}
}