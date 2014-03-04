<?php namespace Entities;

use \Eloquent;

class Group extends Eloquent
{
	protected $table = 'groups';
	
	public function articles()
    {
        return $this->hasMany('\Entities\Article');
    }
}