<?php

namespace App\Controllers;

use App\Views\View;
use App\Models\Article;
use App\Models\Categories;

class MainController {

  public function index(){

  	$object = Article::getObject();
  	$articles = $object->findAll();

    $object2 = Categories::getObject();
    $all_categories = $object2->findAll();

  	
  	$template = "welcome";

  	$all_articles = [
      'all_categories'=>$all_categories,
  		'articles'=>$articles
  	];

  	

  	View::view($template,$all_articles);

  	


  }

}