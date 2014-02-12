<?php 

class Newsletter extends Eloquent
{
	protected $table = 'newsletters';
	
	public function articles() 
	{
		return $this->hasMany('Article');
	}
}