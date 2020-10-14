<?php require_once("resources/views/layouts/header.php")?>

<main class="content">

    <article>

    <?php  
    	$articles = $category_articles;
    	// print_r($articles);
    	// echo $articles->title;
    ?>

    <div class="category_articles">
		 	<?php 

		 	if($articles){
		 	foreach ($articles  as $article) {?>
		 		<a href="<?php echo URL_MAIN; ?>article/<?php echo $article->id;  ?>">
			 		<div class="category_article">

			 			<div class="cat_image">
			 				<img class="cat_articles_images" src="<?php echo $article->image ?>">
			 			</div>
			 			
			 			<div class="cat_title">
			 				  <p><?php echo $article->title;  ?></p>
			 			</div>

					    
				    </div>
			    </a>
	  		<?php }
	  		}
	  		else{
	  			echo "Нет статей";
	  		}

	  		 ?>
	 </div>

	 <p><?php echo $pagination; ?></p>
        
    </article>




    

    <?php require_once("resources/views/layouts/aside.php")?>

</main>

<?php require_once("resources/views/layouts/footer.php")?>




