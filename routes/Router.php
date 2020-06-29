<?php
namespace Router;

class Router
{
	private static $routes = [];

	public static function get($route,$controller_and_action){
		self::$routes[$route] = $controller_and_action;
	}

	public static function check(){
		$url_route = URL_ROUTE;
		$url_route =  trim($url_route,"/");

		$has_route = false;

		foreach(self::$routes as $route=>$controller_and_action){
			if(preg_match("~^$route$~", $url_route,$matches)){
				$has_route = true;
				array_shift($matches);

				$array = explode("@", $controller_and_action);

				$controller = $array[0];
				$action = $array[1];


				$controller = "\App\Controllers\\".$controller;
				$object = new $controller;
				$object->$action(...$matches);
				break;
			}
		}

		if(!$has_route){
			echo "404 not found";
		}

		
	}
}