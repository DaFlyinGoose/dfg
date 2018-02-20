<?php namespace Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $table = 'articles';
	
    public function newsletter() 
    {
        return $this->belongsTo('\Models\Newsletter');
    }
    
	public function group() 
	{
		return $this->belongsTo('\Models\Group', 'group_id', 'id');
	}
	
	public function forwards()
	{
		return $this->hasMany('\Models\Forward');
	}
}