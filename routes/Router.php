<?php
namespace Router;

class Router
{
		
	private  $router;
	private $middleware;
	private $all_routes = [];
	private static $routes = [];
	private $contAct;

		public static function get($route,$controller_and_action){
			self::$routes[$route]['contAct'] = $controller_and_action;
			self::$routes[$route]['middleware'] = null;
			$all_routes = self::$routes;
			return self::before_check($route,$controller_and_action,$all_routes);
			
		}


		public static function before_check($route,$contAct,$all_routes){
			$url_route = URL_ROUTE;
			$url_route =  trim($url_route,"/");
				
				$router = new Router();
				$router->router = $route;
				$router->contAct = $contAct;
				$router->all_routes = $all_routes;
				return $router;
		}

		public  function check($controller_and_action,$matches){
				array_shift($matches);
				$array = explode("@", $controller_and_action);

				$controller = $array[0];
				$action = $array[1];


				$controller = "\App\Controllers\\".$controller;
				$object = new $controller;
				$object->$action(...$matches);
		}

		public function middleware($middlewares){
			$route = $this->router;
			self::$routes[$route]['middleware'] = $middlewares;
		}


		public static function get_all(){

			$url_route = URL_ROUTE;
			$url_route =  trim($url_route,"/");

			 foreach(self::$routes as $route=>$value){

				 	if(preg_match("~^$route$~", $url_route,$matches)){

				 		if($value['middleware']){
				 			// имеет middleware
				 			self::use_middlewares($value,$matches,$value['middleware']);
				 			
				 		}
				 		else{
				 			//Не имеет middleware
				 			self::check($value['contAct'],$matches);
				 		}
					}
				}

		}


		public static function use_middlewares($value,$matches,$middlewares){
			$author_list = ["ramin","hacker","admin"];
			$author = "admin";

			$all_middlewares = [
					'auth' => '\App\Middlewares\AuthMiddleware',
					'hack' => '\App\Middlewares\hackMiddleware',
					'admin' => '\App\Middlewares\AdminMiddleware',
			];


			$uses_middlewares = [];

			for($i=0;$i<count($middlewares);$i++){
				foreach ($all_middlewares as $key => $value2) {
					if($key===$middlewares[$i]){
						$uses_middlewares[$i] = $value2;
					}
				}
			}

			// print_r($uses_middlewares);

			if(count($middlewares)===1){	
					$run_middlewares = new $uses_middlewares[0];
					
					if($run_middlewares->check($author,$author_list)){
						self::check($value['contAct'],$matches);
					}
					else
						echo "У вас нет прав доступа к этой странице";
					
			}
			else{
				$run_middlewares = new $uses_middlewares[0];

				for($i=1;$i<count($uses_middlewares);$i++){
					$run_middlewares->linkWith(new $uses_middlewares[$i]);
				}

				if($run_middlewares->check($author,$author_list)){
					self::check($value['contAct'],$matches);
				}
				else{
					echo "У вас нет прав доступа к этой странице";
				}


				
			}

		}



	
}