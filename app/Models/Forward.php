<?php namespace Models;

use Illuminate\Database\Eloquent\Model;

class Forward extends Model
{
	protected $table = 'forwards';
    
    protected $fillable = array('url', 'forward', 'email_id', 'article_id');
	
	public function email() 
	{
		return $this->belongsTo('\ModelsEmail');
	}
	
	public function article()
	{
		return $this->belongsTo('\Models\Article');
	}
	
	public function forwardHits()
	{
		return $this->hasMany('\Models\ForwardHit');
	}
}