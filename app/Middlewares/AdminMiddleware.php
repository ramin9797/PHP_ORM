<?php

namespace App\Middlewares;


class  AdminMiddleware extends Middleware{
	

	public function check($author_name,$list_authors){
			if($author_name==="admin"){
				// echo "this is admin\n";
				return parent::check($author_name,$list_authors);
			}
			return false;
	}
}