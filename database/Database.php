<?php

namespace Database;
use App\Models\Article;

class Database{

	private $database;
	private static $instance;


	public static function getInstance(){
		if(self::$instance==null){
			return self::$instance=new self();
		}
		else{
			return self::$instance;
		}
	}	

	private function __construct(){
		$settings = require "settings.php";

		$this->database = new \PDO("mysql:host=".$settings['host'].";dbname=".$settings[
			'database'],$settings['user'],$settings['password']);
		$this->database->exec("SET NAMES UTF-8");
	}

	public function query($sql,$params=[],$class='stdClass'){

		
		$stmt = $this->database->prepare($sql);
		$stmt->execute($params);

		$result = $stmt->fetchAll(\PDO::FETCH_CLASS,$class);


		return $result;

	}


	public function create($sql,$params=[],$class='stdClass'){
		$stmt = $this->database->prepare($sql);
		$result = $stmt->execute($params);

		if($result)
			return true;
		else
			return false;
		
	}



}