<?php

namespace App\Views;

class View{

	// private static $home_path = $_SERVER['DOCUMENT_ROOT'];

	private static $main_path ="resources/views/";


	// public function __construct(){

	// }

	public static function view($template,$data=[]){
		$template.=".php";
		$template =  ROOT.self::$main_path.$template;
		extract($data);
		require_once($template);
	}




}
