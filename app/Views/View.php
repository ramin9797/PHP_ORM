<?php

namespace App\Views;

class View{

	private static $main_path ="resources/views/";


	public static function view($template,$data=[]){
		$template.=".php";
		$template =  ROOT.self::$main_path.$template;
		extract($data);
		require_once($template);
	}




}
