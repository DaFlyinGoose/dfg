<?php 

class Newsletter extends Eloquent
{
	protected $table = 'newsletters';
	
	public function articles() 
	{		
		return $this->hasMany('Article');
	}
	
	public function emailGroups()
	{
		return $this->belongsToMany('EmailGroups');
	}
	/*
	public function emailCount()
	{
		$count = 0;
		$groups = $this->emailGroups()->get();
		
		foreach ($groups as $group)
		{
			$count = $count + count($group->emails()->get());
		}
		
		$this->setAttribute('emailCount', $count);
		
		return $this;
	}*/
}