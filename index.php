<?php

require_once("NamespaceAutoloader.php");
use Router\Router;
use Database\Database;


use App\Models\Article;
use App\Models\User;


$object = new NamespaceAutoloader();
$object->addNamespace("App","app");
$object->addNamespace("Router","routes");
$object->addNamespace("Database","database");
$object->addNamespace("Cmd","cmd");
$object->register();





$url = $_GET['route']??'';

$home_path = $_SERVER['DOCUMENT_ROOT'];
$home_path.='/php_projs/project2/';


define("URL_ROUTE", $url);
define("ROOT",$home_path);



$routeObject = new Router();
$routeObject->run();

