<?php

namespace App\Models;

class Article extends ActiveRecord {

	protected $id;
	protected $title;
	protected $content;
	protected $author;
	protected $created_at;



	protected static function getTableName(){
		return "articles";
	}

}