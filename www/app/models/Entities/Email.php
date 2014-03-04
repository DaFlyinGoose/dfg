<?php namespace Entities;

use \Eloquent;

class Email extends Eloquent
{
	protected $table = 'emails';
	
	public function group() 
	{
		return $this->belongsTo('\Entities\EmailGroups');
	}
}