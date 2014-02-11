<?php 

class Email extends Eloquent
{
	protected $table = 'emails';
	
	public function group() 
	{
		return $this->belongsTo('EmailGroups');
	}
}