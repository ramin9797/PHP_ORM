<?php
namespace App\Models;	

class Tasks extends ActiveRecord {
	//body of controller

	protected static function getTableName(){
		return "tasks";
	}
}