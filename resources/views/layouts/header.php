<!DOCTYPE html>
<html>
<head>
    <title>Welcome homme page</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./resources/css/main.css">
</head>
<body>

        <header class="main_header">
			<div class="logo-of-site">
               <img src="./resources/images/site-icon.png" alt="site-icon" class="icon-site-img"/>
            </div>

            <div class="menu">
                <ul>
                    <?php foreach($all_categories as $catagory){?>
                    <li><a href="<?php echo $catagory->route_name; ?>">
                        <?php echo $catagory->name;?>
                    </a></li>
                    <?php } ?>
                </ul>
            </div>

            <div class="search-login">
                <a href="register">Login</a>
                <a href="register">Register</a>
            </div>
		</header>