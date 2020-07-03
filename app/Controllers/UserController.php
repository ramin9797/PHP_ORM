<?php

namespace App\Controllers;
use App\Models\User;
use App\Views\View;
use App\useful_funcs\Defeat;
use App\useful_funcs\Redirect;

class UserController{

	public function index(){
		$object = new User();
		$users = $object->findAll();
		print_r($users);
	}

	public function show($id){
		$object = new User();
		$articles = $object->findById($id);

		print_r($articles);
	}

	public function create_form(){

		$csrf_token = Defeat::csrf_defeat();

		$data = [
			'csrf_token'=>$csrf_token
		];
		$template = 'auth/login';
		View::view($template,$data);
	}


	public function create(){

		//all errors and successes
			// $sessions['create-user-errors'] = [];
			// $sessions['create-user-successes'] = [];
			$errors = [];
			$_SESSION['create-user-success'] = "";
		//

		$url =  $_SERVER['HTTP_REFERER'];
		//get all data from form

		$name =$_POST['name'];
		$csrf_token = $_POST['csrf_token'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		//xss defeat
			$name = Defeat::xss_defeat($name);
		// 


		//
		// $sessions['create-user-errors']

		if(!preg_match("/^[a-zA-Z_-]{4,}$/", $name)){
			$errors[] = "Никнейм должен содержать от 4 символов и состоять из латинских букв";
		}

		if(preg_match("/[a-zA-Z0-9]{6,}/",$password)){
			$password = password_hash($password, PASSWORD_DEFAULT);
		}
		else{
			$errors[] = "Легкий Пароль";
		}


		if(!$_SESSION['scrf_token']===$csrf_token){
			$errors[] = "Scrf_attack";
		}

		$_SESSION['create-user-errors'] = $errors;


		if($_SESSION['create-user-errors'])
			{
				 Redirect::redirect($url,$_SESSION);			
			}
		else{
			$new_user = new User();
			$new_user->name = $name;
			$new_user->email = $email;
			$new_user->password = $password;
			
			if($new_user->create())
				$_SESSION['create-user-success'] = "Пользователь был успешно создан";
			else
			{
				$_SESSION['create-user-errors'] = "Произошла ошибка при создание Пользователя";
				Redirect::redirect($url, $_SESSION);
			}	

			    Redirect::redirect($url,$_SESSION);
		}

	}
}