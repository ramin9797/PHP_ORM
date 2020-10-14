<?php

namespace Router;

class routesMap{

	public static function all_routes(){	

			// 
			Router::get('','MainController@pag_pages');
			Router::get('page-([0-9]+)',"MainController@pag_pages");



			Router::get('mainpage','MainController@mainpage')->middleware(["auth"]);

			// 


			//
			// Router::get("category/([a-zA-Z])","CategoryController@get_this_cat_articles");
			 Router::get("category/([a-zA-Z]+)","CategoryController@get_this_cat_articles");
			 Router::get("category/([a-zA-Z]+)/page-([0-9])","CategoryController@get_this_cat_articles");
			//


			Router::get('articles', 'ArticleController@index');
			Router::get('articles/([0-9]+)','ArticleController@show');
			Router::get("articles/create","ArticleController@create")->middleware(["auth","admin"]);
			Router::get("articles/delete/([0-9]+)","ArticleController@delete");
			Router::get("api/articles","ArticleController@api_show");
			Router::get("articles/get_editor_data","ArticleController@get_editor_data");


			//

			Router::get('users','UserController@index');
			Router::get('register','UserController@create_form');
			Router::get('register/create','UserController@create');
			Router::get('login','UserController@create_login_form')->middleware(["noauth"]);
			Router::get('login/check','UserController@login_check');
			Router::get("user/cabinet","UserController@user_cabinet");
			Router::get("user/logout","UserController@user_logout");
			//
			


			//

			Router::get("categories","CategoryController@index");
			Router::get("api/all_cats","CategoryController@api_show");
			Router::get("category/delete/([0-9]+)","CategoryController@delete");



			// for test
				Router::get("test","TestController@index");
				Router::get("test/create/([a-zA-Z\s]+)","TestController@create_task");
				Router::get("api/test_show","TestController@test_show");
				Router::get("test/delete/([0-9]+)","TestController@test_delete");


				// 


				
				Router::get("test/react","TestController@test_react");
				Router::get("test/get_pdf","TestController@get_pdf");


				Router::get("test/pdf","TestController@test_pdf");
			// 

			Router::get_all();
		}

}
