<?php
namespace App\Controllers;	
use App\Views\View;
use App\Models\Tasks;
use Fpdf\Fpdf;
use Mpdf\Mpdf;
use Mpdf\HTMLParserMode;


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

			$task = $task[0];


			 if($task->delete($id))
			 	echo "Article with id=".$id." was deleted successfully";
			 else 
			 	echo "Error";

	}

	public function test_react(){
		View::view("test/react",[]);
	}

	public function get_pdf(){

		$uploaded_url = ROOT."resources/images/";

		if($_FILES['avatar'])
			{
			    $avatar_name = $_FILES["avatar"]["name"];
			    $avatar_tmp_name = $_FILES["avatar"]["tmp_name"];
			    $error = $_FILES["avatar"]["error"];
			    if(move_uploaded_file($avatar_tmp_name, $uploaded_url.$avatar_name))
			    	echo "Ok";
			    else
			    	echo "image was not uploaded successfully";
			}
			else{
				echo "error ";
			}

		$_SESSION['avatar_image'] = $uploaded_url.$avatar_name;
	}

	public function test_pdf(){

		$mpdf = new Mpdf();
		$stylesheet = file_get_contents("resources/css/main.css");

		$image_src = $_SESSION['avatar_image'];
		$user_name= $_POST['pdf_user_name'];
		$pdf_user_profession= $_POST['pdf_user_profession'];
		$pdf_user_more_info= $_POST['pdf_user_more_info'];

		$html=<<<END
<div class="mpdf_div">

	<div class="mpdf_right gradient">
		<p class="mpdf_user_name"><b>$user_name</b></p>
		<p class="mpdf_user_profession">$pdf_user_profession</p>
		<p class="mpdf_user_more_info"><i>$pdf_user_more_info</i></p>
	</div>
	<div class="mpdf_left gradient">
	<img src="$image_src" class="mpdf_img" />
	</div>
</div>
END;




			$mpdf->WriteHTML($stylesheet,HTMLParserMode::HEADER_CSS);
			$mpdf->WriteHTML($html,HTMLParserMode::HTML_BODY);
			$mpdf->Output();
		}

}