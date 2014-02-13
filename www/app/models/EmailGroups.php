<?php 

class EmailGroups extends Eloquent
{
	protected $table = 'email_groups';
	
	protected $with = array('emails');
	
	public function emails() 
	{
		return $this->hasMany('Email', 'group_id');
	}
	
	public function newsletters()
    {
        return $this->belongsToMany('Newsletter');
    }
}