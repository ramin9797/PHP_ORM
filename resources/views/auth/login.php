<!DOCTYPE html>
<html>
<head>
	<title>All articles</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../project2/resources/css/main.css">
</head>
<body>



	<div class="errors">
		<?php 
		if(isset($_SESSION['create-user-errors'])){
			$errors = $_SESSION['create-user-errors'];
				if(is_array($errors)){
					foreach($_SESSION['create-user-errors'] as $error) {
						?>
						<li><?php echo $error;  ?></li>

						<?php
					}
				}
				else{?>
					<p><?php echo $errors;  ?></p>
				<?php
			}
		}
		 ?>
	</div>

	<div class="successes">
		<?php 
		if(isset($_SESSION['create-user-success']))
			echo $_SESSION['create-user-success'];
		 ?>
	</div>

	<?php
	unset($_SESSION['create-user-success']);
	unset($_SESSION['create-user-errors']);
	 ?>


	<form action="login/create" method="POST">
		<input type="hidden" required="required" name="csrf_token" value="<?php  echo $csrf_token;?>" >
		<input  type="text" required="required" name="name" placeholder="Name">
		<input type="email" required="required" name="email" placeholder="Email">
		<input type="password" required="required"  name="password" placeholder="Password">
		<input type="submit" value="Create">
	</form>

</body>
</html>
