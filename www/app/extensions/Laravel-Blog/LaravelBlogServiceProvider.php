<?php namespace Extensions\LaravelBlog;

use Entities\Post;
use Illuminate\Support\ServiceProvider;

class LaravelBlogServiceProvider extends ServiceProvider 
{
	public function register()
	{
		$this->app->bind('Fbf\LaravelBlog\Post', function($app)
		{
			return new Post();
		});
	}
}

