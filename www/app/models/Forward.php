<?php 

class Forward extends Eloquent
{
	protected $table = 'forwards';
	
	public function email() 
	{
		return $this->belongsTo('Email');
	}
}