<?php

require_once("vendor/autoload.php");
use Router\Router;
use Database\Database;
use App\Models\Article;
use App\Models\User;


$url = $_GET['route']??'';

define("URL_ROUTE", $url);

$routeObject = new Router();
$routeObject->run();

