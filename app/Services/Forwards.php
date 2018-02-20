<?php namespace Services;

use \Request;
use \BrowserDetect;

use \Models\Forward;
use \Models\Article;
use \Models\ForwardHit;

class Forwards
{
	public function findForward($forward)
	{
		return Forward::where('forward', $forward)
			->first();
	}
	
	public function logForward($forward)
	{		
		$hit = new ForwardHit();
		$hit->forward_id = $forward->id;
		$hit->ip = Request::getClientIp();
		$hit->referrer = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER'] : '';
		$hit->browser = \Browser::browserName();
		$hit->os = \Browser::platformName();
		
		return $hit->save();
	}
	
	public function getForwardsByEmail($id)
	{
		$forwards = Forward::where('email_id', $id)->get();
		$forwardHits = array();
		
		foreach ($forwards as $forward)
		{
			$hits = $forward->forwardHits()->get();
			if(count($hits)) 
			{
				foreach($hits as $hit)
				{
					$forwardHits[] = $hit;
				}
			}
		}
		
		return $forwardHits;
	}
	
	public function getForwardsByArticle($id)
	{
		$forwards = Forward::where('article_id', $id)->get();
		$forwardHits = array();
		
		foreach ($forwards as $forward)
		{
			$hits = $forward->forwardHits()->get();
			if(count($hits)) 
			{
				foreach($hits as $hit)
				{
					$forwardHits[] = $hit;
				}
			}
		}
		
		return $forwardHits;
	}
	
	public function getForwardsByNewsletter($id)
	{
		$articles = Article::where('newsletter_id', $id)->get();
		$forwardHits = array();
		
		foreach ($articles as $article)
		{
			$forwardHits = array_merge($forwardHits, $this->getForwardsByArticle($article->id));
		}
		
		return $forwardHits;
	}
}