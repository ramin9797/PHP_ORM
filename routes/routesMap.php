<?php

namespace Router;

class routesMap{

	public static function all_routes(){
			Router::get('articles', 'ArticleController@index')->middleware(["auth","admin"]);
			Router::get('articles/([0-9]+)','ArticleController@show');
			Router::get("articles/create","ArticleController@create")->middleware(["admin"]);


			//

			Router::get('users','UserController@index');
			Router::get('login','UserController@create_form');
			Router::get('login/create','UserController@create');

			//
			Router::get('','MainController@index');

			Router::get_all();
		}

}
