<?php namespace Models;

use Illuminate\Database\Eloquent\Model;

class EmailGroups extends Model
{
	protected $table = 'email_groups';
	
	protected $fillable = array('name');

	const UNSUBSCRIBE_GROUP = 5;
	
	public function emails() 
	{
		return $this->hasMany('\Models\Email', 'group_id');
	}
	
	public function newsletters()
    {
        return $this->belongsToMany('\Models\Newsletter');
    }
}