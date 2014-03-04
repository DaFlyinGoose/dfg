<?php namespace Entities;

use \Eloquent;

class EmailGroups extends Eloquent
{
	protected $table = 'email_groups';
	
	//protected $with = array('emails');
	
	public function emails() 
	{
		return $this->hasMany('\Entities\Email', 'group_id');
	}
	
	public function newsletters()
    {
        return $this->belongsToMany('\Entities\Newsletter');
    }
}