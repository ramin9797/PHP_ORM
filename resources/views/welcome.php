<?php require_once("resources/views/layouts/header.php")?>

<main class="content">

    <article>


    <?php foreach ($articles  as $article) {?>
    <p><?php echo $article->title;  ?></p>

    <?php   } ?>
        
    </article>




    

    <?php require_once("resources/views/layouts/aside.php")?>

</main>

<?php require_once("resources/views/layouts/footer.php")?>




