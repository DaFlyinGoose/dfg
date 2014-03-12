<?php namespace Entities;

use \Eloquent;

class EmailGroups extends Eloquent
{
	protected $table = 'email_groups';
	
	protected $fillable = array('name');
	
	public function emails() 
	{
		return $this->hasMany('\Entities\Email', 'group_id');
	}
	
	public function newsletters()
    {
        return $this->belongsToMany('\Entities\Newsletter');
    }
}