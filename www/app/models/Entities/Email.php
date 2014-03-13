<?php namespace Entities;

use \Eloquent;

class Email extends Eloquent
{
	protected $table = 'emails';
	
	protected $fillable = array('email', 'name', 'group_id');
	
	public function group() 
	{
		return $this->belongsTo('\Entities\EmailGroups');
	}
}