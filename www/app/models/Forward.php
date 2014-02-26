<?php 

class Forward extends Eloquent
{
	protected $table = 'forwards';
    
    protected $fillable = array('url', 'forward', 'email_id');
	
	public function email() 
	{
		return $this->belongsTo('Email');
	}
	
	public function article()
	{
		return $this->belongsTo('Article');
	}
	
	public function forwardHits()
	{
		return $this->hasMany('ForwardHit');
	}
}