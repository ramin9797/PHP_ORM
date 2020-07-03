<?php
session_start(); 
require_once("NamespaceAutoloader.php");
use Router\Router;
use Router\routesMap;


$object = new NamespaceAutoloader();
$object->addNamespace("App","app");
$object->addNamespace("Router","routes");
$object->addNamespace("Database","database");
$object->addNamespace("Cmd","cmd");
$object->register();



$url = $_GET['route']??'';
define("URL_ROUTE", $url);

$home_path = $_SERVER['DOCUMENT_ROOT'];
$home_path.='/php_projs/project2/';

define("ROOT",$home_path);
routesMap::all_routes($url);




