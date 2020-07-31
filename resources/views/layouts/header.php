<!DOCTYPE html>
<html>
<head>
    <title>Welcome homme page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <script src="<?php echo URL_MAIN; ?>resources/bundle.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo URL_MAIN; ?>resources/css/main.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">

</head>
<body>

        <header class="main_header">
			<div class="logo-of-site">
              <a href="/php_projs/project2/">
                <img src="<?php echo URL_MAIN; ?>resources/images/site-icon.png" alt="site-icon" class="icon-site-img"/>
              </a> 
            </div>

            <div class="menu">
                <ul>
                    <?php foreach($categories as $catagory){?>
                    <li><a href="<?php echo $catagory->route_name; ?>">
                        <?php echo $catagory->name;?>
                    </a></li>
                    <?php } ?>
                </ul>
            </div>


            <div class="search-login">

                <?php if(isset($_COOKIE['logged_user'])){?>
                    <a href="#" class="show_user_settings">User</a>
                    
                    <div class="user-settings modal-hidden"> 
                        <li><a href="user/cabinet">Cabinet</a></li>
                        <li><a href="user/logout">Logout</a></li>
                    </div>


              <?php } ?>

                <?php if(!isset($_COOKIE['logged_user'])){?>
                    <a href="login">Login</a>
                    <a href="register">Register</a>
              <?php } ?>
            </div>
		</header>