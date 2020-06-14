#!/usr/bin/env php
<?php

if($argv[1]==="make:controller"){
	$controllerName = $argv[2];
	if(file_exists("app/Controllers/".$controllerName.".php")){
		echo "Такой контроллер уже создан";
	}
	else{
		$fh = fopen("app/Controllers/".$controllerName.".php", "w") or die("Создать файл не удалось");	
		// 
		$text = <<<_END
		<?php
		namespace App\Controllers;	\n\r
		class $controllerName {
			//body of controller
		}
		_END;
		fwrite($fh, $text);
		fclose($fh);
		echo "Controller ".$controllerName." was created successfully";
	}
}
else if($argv[1]==="make:model"){
	$modelName = $argv[2];

	$tableName = lcfirst($modelName)."s";

	if(file_exists("app/Models/".$modelName.".php")){
		echo "Такой модель уже создан";
	}
	else{
		$fh = fopen("app/Models/".$modelName.".php","w") or die("Создать файл не удалось");

		 $text = <<<_END
		<?php
			  namespace App\Models; \n\r
				class $modelName  extends ActiveRecord {\n\r
					protected static function getTableName(){
						return "$tableName";
					}\n\r
				}
		_END;

	 fwrite($fh, $text);
	 fclose($fh);
	 echo "Model ".$modelName." was created successfully";
	}


}





?>