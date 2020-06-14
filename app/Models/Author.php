<?php
	  namespace App\Models; 

		class Author  extends ActiveRecord {

			protected static function getTableName(){
				return "authors";
			}

		}