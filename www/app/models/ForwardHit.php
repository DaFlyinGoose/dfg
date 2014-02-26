<?php 

class ForwardHit extends Eloquent
{
	protected $table = 'forward_hits';
    
    protected $fillable = array('forward_id', 'ip', 'referrer', 'browser', 'os');
	
	public function forward()
	{
		return $this->belongsTo('Forward');
	}
	
}