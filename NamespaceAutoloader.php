<?php

class NamespaceAutoloader{

	private $routesMap = [];

	public function addNamespace($namespace,$rootDir){
		if(is_dir($rootDir)){
			$this->routesMap[$namespace] = $rootDir;
			return true;
		}
		return false;
	}

	public function register(){
		spl_autoload_register(array($this,'autoload'));
	}

	public function autoload($class){

		$array1 = explode("\\", $class);

		$rootdir = array_shift($array1);

		if($this->routesMap[$rootdir]){
			$end_point = $this->routesMap[$rootdir]."/".implode("/", $array1).".php";
			require_once($end_point);
			return true;
		}
		return false;

	}

}