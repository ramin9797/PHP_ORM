<?php

namespace Router;

class Router
{

	private $routes = [];


	public function __construct(){
		$routes = require "routesMap.php";
		$this->routes = $routes;
	}

	public  function run(){

		$url = URL_ROUTE;
		$url = trim($url,"/");


		$hasRoute = false;

		foreach($this->routes as $route=>$controller){
			if(preg_match("~^$route$~", $url,$matches)){
				$hasRoute = true;
				array_shift($matches);
				$parametres =  $matches;

				$controllerName = "\App\Controllers\\".$controller[0];
				$action = $controller[1];

				$object = new $controllerName;
				$object->$action(...$parametres);


					break;
			}


		}

		if($hasRoute==false)
			echo "555 not found";
	}

}
