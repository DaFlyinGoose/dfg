<?php 

class Article extends Eloquent
{
	protected $table = 'articles';
	
    public function newsletter() 
    {
        return $this->belongsTo('Newsletter');
    }
    
	public function group() 
	{
		return $this->belongsTo('Group', 'group_id', 'id');
	}
	
	public function forwards()
	{
		return $this->hasMany('Forward');
	}
}