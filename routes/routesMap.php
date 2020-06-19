<?php


return [
	'articles'=>['ArticleController','index'],
	'articles/([0-9]+)'=>['ArticleController','show'],
	'articles/create'=>['ArticleController','create'],
	'users'=>['UserController','index'],
	'user/([0-9]+)'=>['UserController','show'],
	'authors'=>['AuthorController','index'],
	'author/create'=>['AuthorController','create'],
	''=>['MainController','index'],

];