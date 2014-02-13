<?php 

class Forward extends Eloquent
{
	protected $table = 'forwards';
    
    protected $fillable = array('url', 'forward', 'email_id');
	
	public function email() 
	{
		return $this->belongsTo('Email');
	}
}