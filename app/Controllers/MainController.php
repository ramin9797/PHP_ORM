<?php

namespace App\Controllers;

use App\Views\View;
use App\Models\Article;

class MainController {

  public function index(){

  	$object = Article::getObject();
  	$articles = $object->findAll();

  	
  	$template = "home";

  	$all_articles = [
  		'articles'=>$articles
  	];

  	

  	View::view($template,$all_articles);

  	


  }

}