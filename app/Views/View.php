<?php

namespace App\Views;

class View{

	


	public static function view($template,$data=[]){

		// Registry all data for all views 
		$app = \App\Providers\Registry::instance(); //
		$objects = $app->start();

		foreach ($objects as $key => $value) {
			$data[$key] = $value;
		}

		// 

		$main_path ="resources/views/";
		$template.=".php";
		$template =  ROOT.$main_path.$template;
		
		extract($data);
		require_once($template);

		

			//start twig 
		// $loader = new \Twig\Loader\FilesystemLoader('resources/views');

		// $twig = new \Twig\Environment($loader);
		// $twig->addGlobal('session', $_SESSION);


		// $template = $twig->load($template);
		// echo $template->render($data);
			//end twig




	}


}
