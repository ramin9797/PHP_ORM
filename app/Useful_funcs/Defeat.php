<?php

namespace App\Useful_funcs;

class Defeat{

	public static function csrf_defeat(){
		$_SESSION['csrf_token'] =  bin2hex(random_bytes(32));
		return $_SESSION['csrf_token'];
	}

	public static function xss_defeat($var){
		$var= strip_tags($var);
		$var = htmlentities($var, ENT_QUOTES, "UTF-8");
		$var = htmlspecialchars($var, ENT_QUOTES);
		return $var;
	}

}