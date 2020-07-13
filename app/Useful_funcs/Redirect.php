<?php

namespace App\Useful_funcs;
use App\Views\View;

class Redirect{

	public static function redirect($url,$name,$data){
		$_SESSION[$name] = $data;
		$url = "http://localhost/php_projs/project2/".$url;
		header('Location:'.$url);
	}

}