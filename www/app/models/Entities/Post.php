<?php namespace Entities;

use Fbf\LaravelBlog\Post as BlogPost;
use \Auth;

class Post extends BlogPost
{
	/**
	 * Query scope for "live" posts, adds conditions for status = APPROVED and published date is in the past
	 *
	 * @param $query
	 * @return mixed
	 */
	public function scopeLive($query, $adminLive = true)
	{
		// if admin by default consider this post live
		if (Auth::check() && $adminLive)
		{
			return $query;	
		}

		return $query->where($this->getTable().'.status', '=', Post::APPROVED)
			->where($this->getTable().'.published_date', '<=', \Carbon\Carbon::now());
	}

	public function scopeLatest($query, $take = 3)
	{
		return $query
			->live(false)
			->orderBy('published_date', 'DESC')
			->take($take);
	}

	public function getHumanDateAttribute()
	{
		$date = new \DateTime($this->attributes['published_date']);
		return \Carbon\Carbon::instance($date)->diffForHumans();
	}
}
