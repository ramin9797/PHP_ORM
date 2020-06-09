<?php

namespace App\Models;

use Database\Database;

abstract class ActiveRecord {

	private static $object;
	private $databaseConnect;
	private $key;


	public function getObject(){
		if(static::$object==null)
			return static::$object = new static();
		else 
			return static::$object;
	}

	
	public function __construct(){
		$this->databaseConnect = Database::getInstance();
	}


//getters and setters
	public function __get($property){
		if(property_exists($this, $property)){
			return $this->property;
		}
		else{
			return false;
		}
	}


	public function __set($property,$value){
			 $this->$property= $value;
	}

	 
// end getters and setters


// Select from database

	public function findAll(){
		$sql = "SELECT * FROM ".static::getTableName();
		$result = $this->databaseConnect->query($sql,[],static::class);

		$object = new static;

		
		foreach ($result as $key => $value)
		{

			$object->$key = $value;
		}

		return $object;

	}

	public function findById($id){

		$sql = "SELECT * FROM ".static::getTableName()." WHERE id=:id";
		$params = ["id"=>$id];

		$result = $this->databaseConnect->query($sql,$params,static::class);
		return $result;
	}


	public function where($propertyName,$operator,$propertyValue){
      	$articles = $this;

      	$result = [];

      	foreach ($articles as $key => $value)
		{
			if(preg_match("~[0-9]+~", $key)){

				if($articles->toOperator($value,$propertyName,$operator,$propertyValue)){
					print_r($value);
				}

			}
		}

	}

	private function toOperator($object,$propertyName,$operator,$propertyValue){
		switch ($operator) {
			case '>':
				return $object->$propertyName>$propertyValue;
				break;
			case '<':
				return $object->$propertyName<$propertyValue;
				break;
			case '=':
				return $object->$propertyName==$propertyValue;
				break;
			
		}
	}




// Insert , Update,Delete

	private function reflection(){
		$reflector = new \ReflectionObject($this);
		$properties = $reflector->getProperties();
		$mapProperties = [];

		foreach ($properties as $property) {
			$propertyName = $property->getName();
			$mapProperties[$propertyName] = $this->$propertyName;
		}

		return $mapProperties;



	}

	public function create(){

		$mapProperties = array_filter($this->reflection()); // delete null values
		$columns = [];
		$values = [];

		foreach($mapProperties as $columnName => $columnValue){
				$columns[] = $columnName;
				$values[] = ":".$columnName;
			}

		$columns = implode(",",$columns);
		$values = implode(",",$values);

		$sql = "INSERT INTO ".static::getTableName()."(".$columns.") VALUES(".$values.")";
		$result = $this->databaseConnect->query($sql,$mapProperties,static::class);

		return $result;

	}

// 




}