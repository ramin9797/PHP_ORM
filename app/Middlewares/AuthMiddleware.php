<?php

namespace App\Middlewares;


class AuthMiddleware extends Middleware{

		public function check($author_name,$list_authors){
				if(in_array($author_name, $list_authors)){
					// echo $author_name." is authorised\n";
					return parent::check($author_name,$list_authors);
				}
				return false;
		}


}