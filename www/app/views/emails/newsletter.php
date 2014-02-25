<html>
<body>
<?php 
echo $newsletter->intro . '<br><br>';
foreach ($articleForwards as $group => $articles)
{
	echo '<h2>' . $group . '</h2>';
	foreach ($articles as $article)
	{
		echo '<h4>' . $article['article']->title . '</h4>'
			. $article['article']->description . '<br><br>'
			. '<a href=' . $_SERVER['HTTP_HOST'] . '/' . $article['forward'] . '>' . $article['article']->url . '</a><br><br>';
	}
}
echo $newsletter->conclusion;
?>
</body>
</html>