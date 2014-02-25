<html>
<body>
<?php 
foreach ($articleForwards as $group => $articles)
{
	echo '<h3>' . $group . '</h3>';
	foreach ($articles as $article)
	{
		echo '<h4>' . $article['article']->title . '</h4>'
			. $article['article']->description . '<br><br>'
			. '<a href=' . $_SERVER['HTTP_HOST'] . '/' . $article['forward'] . '>' . $article['article']->url . '</a><br><br>';
	}
}
?>
</body>
</html>