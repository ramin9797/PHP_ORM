<?php


return [
	'articles'=>['ArticleController','index'],
	'articles/([0-9]+)'=>['ArticleController','show'],
	'articles/create'=>['ArticleController','create'],
	'api/articles'=>['ArticleController','api_show'],
	'article/delete/([0-9]+)'=>['ArticleController','delete'],
	''=>['MainController','index'],

];