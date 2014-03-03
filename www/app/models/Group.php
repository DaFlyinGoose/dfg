<?php 

class Group extends Eloquent
{
	protected $table = 'groups';
	
	public function articles()
    {
        return $this->hasMany('Article');
    }
}