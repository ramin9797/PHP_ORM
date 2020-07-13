<?php

namespace Router;

class routesMap{

	public static function all_routes(){
			Router::get('articles', 'ArticleController@index')->middleware(["auth","admin"]);
			Router::get('articles/([0-9]+)','ArticleController@show');
			Router::get("articles/create","ArticleController@create")->middleware(["admin"]);
			Router::get("api/articles","ArticleController@api_show");


			//

			Router::get('users','UserController@index');
			Router::get('register','UserController@create_form');
			Router::get('register/create','UserController@create');

			//
			Router::get('','MainController@index');


			//

			Router::get("categories","CategoryController@index");
			Router::get("api/all_cats","CategoryController@api_show");
			Router::get_all();
		}

}
