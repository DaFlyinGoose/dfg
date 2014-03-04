<?php namespace Entities;

use \Eloquent;

class Newsletter extends Eloquent
{
	protected $table = 'newsletters';
	
	public function articles() 
	{		
		return $this->hasMany('\Entities\Article');
	}
	
	public function emailGroups()
	{
		return $this->belongsToMany('\Entities\EmailGroups');
	}
    
    public function groupArticles()
    {
        $groups = array();
        foreach (Group::all() as $group) 
        {
            $groups[$group->order] = $group->group;
        }
        
        ksort($groups);
        $groupedArticles = array();
        foreach ($groups as $group) {
            $groupedArticles[$group] = array();
        }
        
        $articles = $this->articles()->get();
        foreach ($articles as $key => $article)
        {
            $groupedArticles[$article->group()->first()->group][$key] = $article;
        }
        
        return $groupedArticles;
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