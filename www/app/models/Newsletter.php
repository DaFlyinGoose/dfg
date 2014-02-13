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
    
    public function groupArticles()
    {
        $articles = $this->articles()->get();
        $groupedArticles = array();
        
        foreach ($articles as $article)
        {
            $groupedArticles[strtolower($article->group)] = $article;
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