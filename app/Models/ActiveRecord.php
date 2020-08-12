<?php

namespace App\Models;

use Database\Database;

abstract class ActiveRecord {

	private static $object;
	private $databaseConnect;
	private $key;
	private $sql;
	private $params = [];
	private $for_pdo_params = 1;

	public function getObject(){
			return static::$object = new static();
	}

	
	public function __construct(){
		$this->databaseConnect = Database::getInstance();
	}


//getters and setters
	public function __get($property){
		if(property_exists($this, $property)){
			return $this->$property;
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

		$this->params = [];

		$this->sql =$sql;

		return $this;



	}

	public function findById($id){
		$sql = "SELECT * FROM ".static::getTableName()." WHERE id=:id";
		$params = ["id"=>$id];

		$result = $this->databaseConnect->query($sql,$params,static::class);

		return $result;
		// foreach($result as $key =>$value){
		// 	print_r($value);
		// }
		
	}


	public function last(){
		$sql = "SELECT * FROM ".static::getTableName()." ORDER BY id DESC LIMIT 1";
		$result = $this->databaseConnect->query($sql,[],static::class);

		return $result;
	}


	public function where($propertyName,$operator,$propertyValue){

		$pdo_name = ":".$propertyName."".$this->for_pdo_params++;


		$this->params[$pdo_name] = $propertyValue;

		$this->sql .= " WHERE ".$propertyName."$operator".$pdo_name;
		return $this;

	}

	public function AndWhere($propertyName,$operator,$propertyValue){

		$pdo_name = ":".$propertyName.$this->for_pdo_params++;

		$this->params[$pdo_name] = $propertyValue;

		$this->sql .= " AND  ".$propertyName.$operator.$pdo_name;
		return $this;
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
		$result = $this->databaseConnect->create($sql,$mapProperties,static::class);

		return $result;
	}


// 


	// delete object from database

	public function delete($id){
		$sql = "DELETE FROM ".static::getTableName()." WHERE id=:id";

		$array = [":id"=>$id];
		$result = $this->databaseConnect->query($sql,$array,static::class);
		return true;
	}

	// 

	public function get(){	

			$sql = $this->sql;
			$params = $this->params;

			
			$result = $this->databaseConnect->query($sql,$params,static::class);
			return $result;
	}




}