<?php namespace Models;

use Illuminate\Database\Eloquent\Model;

class ForwardHit extends Model
{
	protected $table = 'forward_hits';
    
    protected $fillable = array('forward_id', 'ip', 'referrer', 'browser', 'os');
	
	public function forward()
	{
		return $this->belongsTo('\Models\Forward');
	}
	
}