<?php
namespace App\Controllers;	
use App\Models\Categories;
use App\Models\Article;
use App\Views\View;
use App\Useful_funcs\Pagination;

class CategoryController {
	//body of controller

	public function index(){
		// $template = "categories/index";

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


	public function get_this_cat_articles($cat_name,$current_page=1){

		$category = Categories::getObject();
		$cat = $category->findAll()->where("route_name","=",$cat_name)->get();
		$category_id =  intval($cat[0]->id);


		$object = Article::getObject();
		$cat_articles = $object->findAll()->where("category_id","=",$category_id)->get();



		$count_of_articles = count($cat_articles);
        $max_articles_in_one_page = 4;


        $pagination = new Pagination($count_of_articles,$max_articles_in_one_page,$current_page);
        $pag_navigation =  $pagination->get_pag();

        // 

        $pag_data = $object->findAll()->where("category_id","=",$category_id)->get_pag_data($current_page,$max_articles_in_one_page)->get();



		$template = "categories/index";


		 $data = [
          'category_articles'=>$pag_data,
          'pagination'=>$pag_navigation
          ];


		View::view($template,$data);
	}
}