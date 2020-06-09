<?php

namespace App\Controllers;
use App\Models\Article;

class ArticleController{


	
	public function index(){
		$object = Article::getObject();
		$id=1;
		$articles = $object->findAll()->where("id","=",6);
		print_r($articles);
		// return $this;
	}

	public function show($id){
		$object = Article::getObject();
		$articles = $object->findById($id);

		print_r($articles);
	}



	public function create(){
		$article = new Article();

		$article->title = "New title";
		$article->content = "New Text";
		$article->author = "New author";
		$article->create();

	}

	public function create_two($id){
		
	}
}