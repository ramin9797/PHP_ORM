<?php
namespace App\Controllers;	
use App\Views\View;
use App\Models\Tasks;


class TestController {
	//body of controller

	public function index(){
		View::view("test/index",[]);
	}

	public function create_task($task){
		// echo $task;
		$new_task = New Tasks();
		$new_task->task = $task;

		if($new_task->create()){
			$object = Tasks::getObject();
			$last = $object->last();
			echo $last->id;
		}
		
		else
			echo "error";
		
	}

	public function test_show(){
		$object = Tasks::getObject();
		$tasks = $object->findAll()->get();
		echo json_encode($tasks);
	}

	public function test_delete($id){
			$object = Tasks::getObject();
			$task = $object->findById($id);

			 if($task->delete($id))
			 	echo "Article with id=".$id." was deleted successfully";
			 else 
			 	echo "Error";

	}


}