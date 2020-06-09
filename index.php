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
$object->register();



$url = $_GET['route']??'';

define("URL_ROUTE", $url);

$routeObject = new Router();
$routeObject->run();

