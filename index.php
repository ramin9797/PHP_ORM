<?php
session_start(); 

require_once 'vendor/autoload.php';

use Router\Router;
use Router\routesMap;


$url = $_GET['route']??'';
define("URL_ROUTE", $url);

$localhost_url = "http://localhost/php_projs/project2/";
define("URL_MAIN",$localhost_url);



$home_path = $_SERVER['DOCUMENT_ROOT'];
$home_path.='/php_projs/project2/';

define("ROOT",$home_path);
routesMap::all_routes($url);

