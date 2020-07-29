<?php require_once("resources/views/layouts/header.php")?>

<main class="content">

    <article>

    <div class="successes">
		<?php 
		if(isset($_SESSION['login_success'])){?>
			<p><?php echo $_SESSION['login_success'];?></p>
		<?php } ?>

		<?php if(isset($_SESSION['user_create_success'])){?>
			<p><?php echo $_SESSION['user_create_success'];?></p>
		<?php } ?>

		<?php if(isset($_SESSION['user_logout'])){?>
			<p><?php echo $_SESSION['user_logout'];?></p>
		<?php } ?>

	</div>

	<div class="errors">
		<?php if(isset($_SESSION['access_error'])){?>
			<p><?php echo $_SESSION['access_error'];?></p>
		<?php } ?>
	</div>

	<?php
	unset($_SESSION['login_success']);
	unset($_SESSION['user_create_success']);
	unset($_SESSION['user_logout']);
	unset($_SESSION['access_error']);
	 ?>


    <?php foreach ($articles  as $article) {?>
    <p><?php echo $article->title;  ?></p>

    <?php   } ?>
        
    </article>




    

    <?php require_once("resources/views/layouts/aside.php")?>

</main>

<?php require_once("resources/views/layouts/footer.php")?>




