<?php
namespace App\Models;	

class Categories extends ActiveRecord {


	protected static function getTableName(){
		return "categories";
	}
}