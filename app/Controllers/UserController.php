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

	// cabinet

	public function user_cabinet(){
		$template = 'user/index';
		View::view($template);
	}

	public function user_logout(){

		$url = "";
		setcookie('logged_user',"",time()-3600,"/");

		Redirect::redirect($url,"user_logout","Пользователь успешно вышел из системы");
	}

	// end cabinet

	// Register
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
		$template = 'auth/register';
		View::view($template,$data);
	}


	public function create(){

		$errors = [];
		$_SESSION['create-user-success'] = "";

		$url_error = "register";
		$url_success = "";

		$name = $_POST['name'];
		$csrf_token = $_POST['csrf_token'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		//xss defeat
			$name = Defeat::xss_defeat($name);
		// 

		if(!preg_match("/^[a-zA-Z_-]{4,}$/", $name)){
			$errors[] = "Никнейм должен содержать от 4 символов и состоять из латинских букв";
		}

		if(preg_match("/[a-zA-Z0-9]{6,}/",$password)){
			$password = password_hash($password, PASSWORD_DEFAULT);
		}
		else{
			$errors[] = "Легкий Пароль";
		}


		if($_SESSION['csrf_token']!==$csrf_token){
			$errors[] = "CSRF ATTACK";
		}




			$new_user = new User();
			$new_user->name = $name;
			$new_user->email = $email;
			$new_user->password = $password;
			
			if(!$errors){
				if($new_user->create()){
					$success = "Пользователь был успешно создан";
					setcookie('logged_user',$new_user->email,time()+3600,"/");
					Redirect::redirect($url_success,'user_create_success',$success);
				}
				else{
					$errors[] = "Произошла ошибка при создание Пользователя";
					Redirect::redirect($url_error,'user_create_errors',$errors);
				}
			}
			else
			{
				$errors[] = "Произошла ошибка при создание Пользователя";
				Redirect::redirect($url_error,'user_create_errors',$errors);
			}	

	}


// endRegister


// Login
	public function create_login_form(){
		$csrf_token = Defeat::csrf_defeat();

		$data = [
			'csrf_token'=>$csrf_token
		];
		$template = 'auth/login';
		View::view($template,$data);
	}


	public function login_check(){

		$errors = [];

		$email = $_POST['email'];
		$password = $_POST['password'];
		$csrf_token = $_POST['csrf_token'];

		$url_error = "login";

		if($_SESSION['csrf_token']!==$csrf_token){
			$errors[] = "CSRF ATTACK";
		}

		 $object = User::getObject();
		 $user= $object->findAll()->where("email","=",$email)->get();

		 if($user&&!$errors){
		 	 if(password_verify($password, $user->password)){
			 	$success = "Успешная авторизация";
				setcookie('logged_user',$user->email,time()+3600,"/");
			 	Redirect::redirect("","login_success",$success);
			 }
			 else {
			 	$errors[] = "Неправильный пароль";
			 	Redirect::redirect($url_error,"login_error",$errors);
			 }
		 }
		 else{
		 	$errors[] = "Пользователь не найден";
		 	Redirect::redirect($url_error,"login_error",$errors);
		 }

	}



// Endlogin



}