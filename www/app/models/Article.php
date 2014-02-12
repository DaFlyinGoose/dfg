<?php 

class Article extends Eloquent
{
	protected $table = 'articles';
	
	public function newsletter() 
	{
		return $this->belongsTo('Newsletter');
	}
}