<?php
namespace App\Models;	

class Author extends ActiveRecord {
	//body of controller

	protected static function getTableName(){
		return "authors";
	}
	
}