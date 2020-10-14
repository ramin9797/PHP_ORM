<?php

namespace App\Controllers;

use App\Views\View;
use App\Models\Article;
use App\Models\Categories;
use App\Useful_funcs\Pagination;

class MainController {


  public function pag_pages($current_page=1){

      $template = 'welcome';
   

        // $object = Article::getObject();
        // $articles = $object->findAll()->get();

        // $count_of_articles = count($articles);
        // $max_articles_in_one_page = 6;

        // $pagination = new Pagination($count_of_articles,$max_articles_in_one_page,$current_page);
        // $pag_navigation =  $pagination->get_pag();
        // $pag_data = $object->findAll()->get_pag_data($current_page,$max_articles_in_one_page)->get();

        // $pag_data = $object->get_pag_data($current_page,$max_articles_in_one_page)->get();
        // print_r($pag_data);
        // return true;

         // $data = [
         //  'pag_data'=>$pag_data,
         //  'pagination'=>$pag_navigation
         //  ];

        $data = [];

      View::view($template,$data);

        

  }




}