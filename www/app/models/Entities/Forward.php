<?php namespace Entities;

use \Eloquent;

class Forward extends Eloquent
{
	protected $table = 'forwards';
    
    protected $fillable = array('url', 'forward', 'email_id');
	
	public function email() 
	{
		return $this->belongsTo('\EntitiesEmail');
	}
	
	public function article()
	{
		return $this->belongsTo('\Entities\Article');
	}
	
	public function forwardHits()
	{
		return $this->hasMany('\Entities\ForwardHit');
	}
}