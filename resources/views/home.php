<!DOCTYPE html>
<html>
<head>
	<title>title</title>
	<meta charset="utf-8">
</head>
<body>


<p>Home page</p>

<?php

	foreach ($articles as $article) {
		echo $article->title."<br>";
	}

?>


</body>
</html>
