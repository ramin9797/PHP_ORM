<?php

namespace App\Useful_funcs;
use App\Views\View;

class Redirect{

	public static function redirect($url,$data){
		header('Location:'.$url);
	}

}