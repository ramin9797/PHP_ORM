<?php

namespace App\Controllers;

use App\Views\View;
use App\Models\Article;
use App\Models\Categories;

class MainController {

  public function index(){

  	$object = Article::getObject();
  	$articles = $object->findAll()->get();

    // $object2 = Categories::getObject();
    // $categories = $object2->findAll()->get();

  	$template = "welcome";
    $data = [
      'name'=>'ramin',
      'articles'=>$articles,
      // 'categories'=>$categories,
    ];
  	

  	View::view($template,$data);

  }

  public function mainpage(){

    // $object2 = Categories::getObject();
    // $categories = $object2->findAll()->get();

    $template = 'homepage';
    $data = ['name'=>'messi'];
    View::view($template,$data);

  }

}