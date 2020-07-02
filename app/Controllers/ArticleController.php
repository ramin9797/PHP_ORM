<?php

namespace App\Controllers;
use App\Models\Article;
use App\Views\View;
class ArticleController{


	
	public function index(){
		
  	$template = "articles";
  	View::view($template);

	}

	public function show($id){
		$object = Article::getObject();
		$articles = $object->findById($id);

		print_r($articles);
	}



	public function create(){
		// $article = new Article();

		// $article->title = "New title";
		// $article->content = "New Text";
		// $article->author = "New author";
		// $article->create();

		echo "create";

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
}