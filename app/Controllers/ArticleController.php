<?php

namespace App\Controllers;
use App\Models\Article;
use App\Views\View;
class ArticleController{


	
	public function index(){

		// $articles = $object->findAll()->where('id','>','20')->AndWhere('id','<','24')->get();
		// print_r($articles);
		
		// foreach ($articles as $key => $value) {
		// 	echo $value->title.$value->id;
		// 	echo "<br>";
		// }
		View::view('articles/index',[]);

	}

	public function show($id){
		$object = Article::getObject();
		$articles = $object->findById($id);

		print_r($articles);
	}



	public function create(){

		$article = new Article();

		$article->title = "New title";
		$article->text = "New Text";

		

		if($article->create())
			echo "create";
		else
			echo "error";
		

	}

	public function delete($id){
		
		$article = Article::getObject();
		 
		 if($article->delete($id))
		 	echo "Article with id=".$id." was deleted successfully";
		 else 
		 	echo "Error";
	}

	public function api_show(){
		$object = Article::getObject();
		$articles = $object->findAll();
		$articles = json_decode(json_encode($articles), true);
		echo json_encode($articles);
	}

	public function get_editor_data(){
		 $editor_data = $_POST[ 'content' ];
		 echo $editor_data;
	}
}