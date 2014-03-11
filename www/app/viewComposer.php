<?php
View::composer('includes.details', function($view)
{
    $article = Entities\Post::where('slug', Request::segment(2))
		->first();
	
	$article->hits = $article->hits + 1;
	$article->save();
});
View::composer(array('administrator::layouts.default'), function($view)
{
    if ($view->page === 'site.admin.order')
    {
        //add page-specific assets
        $view->js['jquery'] = '/js/jquery-1.9.1.min.js';
        $view->js += array(
            'admin' => '/js/admin.js',
        );
        $view->css += array(
            'jquery-ui' => '/css/jquery-ui.css',
            'admin' => '/css/admin.css',
        );
    }
});

View::composer(array('site.admin.order'), function($view) { 
    $view->with('groups', \Entities\Group::all());
});
?>
