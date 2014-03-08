<?php namespace Entities;

use Fbf\LaravelBlog\Post as BlogPost;

class Post extends BlogPost
{
	public function scopeLatest($query, $take = 3)
	{
		return $query
			->live()
			->orderBy('published_date', 'DESC')
			->take($take);
	}

	public function getHumanDateAttribute()
	{
		$date = new \DateTime($this->attributes['published_date']);
		return \Carbon\Carbon::instance($date)->diffForHumans();
	}
}
