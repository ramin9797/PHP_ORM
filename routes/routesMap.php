<?php

namespace Router;

class routesMap{

	public static function all_routes(){	

			// 
			Router::get('','MainController@index');
			Router::get('mainpage','MainController@mainpage');
			// 


			Router::get('articles', 'ArticleController@index')->middleware(["auth","admin"]);
			Router::get('articles/([0-9]+)','ArticleController@show');
			Router::get("articles/create","ArticleController@create");
			Router::get("articles/delete/([0-9]+)","ArticleController@delete");
			Router::get("api/articles","ArticleController@api_show");


			//

			Router::get('users','UserController@index');
			Router::get('register','UserController@create_form');
			Router::get('register/create','UserController@create');

			//
			


			//

			Router::get("categories","CategoryController@index");
			Router::get("api/all_cats","CategoryController@api_show");
			Router::get("category/delete/([0-9]+)","CategoryController@delete");

			Router::get_all();
		}

}
