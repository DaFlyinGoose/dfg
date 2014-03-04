<?php namespace Entities;

use \Eloquent;

class Article extends Eloquent
{
	protected $table = 'articles';
	
    public function newsletter() 
    {
        return $this->belongsTo('\Entities\Newsletter');
    }
    
	public function group() 
	{
		return $this->belongsTo('\Entities\Group', 'group_id', 'id');
	}
	
	public function forwards()
	{
		return $this->hasMany('\Entities\Forward');
	}
}