<?php

namespace Router;

class routesMap{

	public static function all_routes(){
			Router::get('articles', 'ArticleController@index');
			Router::get('articles/([0-9]+)','ArticleController@show');
			Router::get('articles/([0-9]+)','ArticleController@show');
			Router::get('','MainController@index');
			Router::check();
		}

}
