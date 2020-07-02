<?php

namespace App\Middlewares;


class  HackMiddleware extends Middleware{
	

	public function check($author_name,$list_authors){
			if($author_name==="hacker"){
				// echo "this is hacker\n";
				return parent::check($author_name,$list_authors);
			}
				return false;
	}
}