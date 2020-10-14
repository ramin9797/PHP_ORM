<?php
session_start(); 

require_once 'vendor/autoload.php';

use Router\Router;
use Router\routesMap;


$url = $_GET['route']??'';
define("URL_ROUTE", $url);



// define("CURRENT_URL",$_SERVER['REQUEST_URI']);


$localhost_url = "http://localhost/php_projs/passion/";
define("URL_MAIN",$localhost_url);



$home_path = $_SERVER['DOCUMENT_ROOT'];
$home_path.='/php_projs/passion/';

define("ROOT",$home_path);
routesMap::all_routes($url);

