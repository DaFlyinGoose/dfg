<?php namespace Models;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
	protected $table = 'newsletters';
	
	public function articles() 
	{		
		return $this->hasMany('\Models\Article');
	}
	
	public function emailGroups()
	{
		return $this->belongsToMany('\Models\EmailGroups');
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