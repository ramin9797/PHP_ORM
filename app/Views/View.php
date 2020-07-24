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



		$template.=".php";
		$loader = new \Twig\Loader\FilesystemLoader('resources/views');

		$twig = new \Twig\Environment($loader);
		$template = $twig->load($template);
		echo $template->render($data);


	}


}
