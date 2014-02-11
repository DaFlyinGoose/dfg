<?php 

class EmailGroups extends Eloquent
{
	protected $table = 'email_groups';
	
	public function emails() 
	{
		return $this->hasMany('Email', 'group_id');
	}
}