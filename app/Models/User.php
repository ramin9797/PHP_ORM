<?php
namespace App\Models;


class User extends ActiveRecord{

	private $id;
	private $name;
	private $email;

	protected static function getTableName(){
			return "users";
		}
	



}