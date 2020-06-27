<?php

namespace App\Models;

class Article extends ActiveRecord {

	// protected $id;
	// protected $title;
	// protected $text;
	// protected $created_at;
	// protected $updated_at;

	protected static function getTableName(){
		return "articles";
	}
}