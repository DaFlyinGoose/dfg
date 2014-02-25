<?php namespace Services;

class Forwards
{
	public function findForward($forward)
	{
		return \Forward::where('forward', $forward)
			->first();
	}
	
	public function logForward($forward)
	{		
		$hit = new \ForwardHit();
		$hit->forward_id = $forward->id;
		$hit->ip = \Request::getClientIp();
		$hit->referrer = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER'] : '';
		$hit->browser = \BrowserDetect::browserName();
		$hit->os = \BrowserDetect::osFamily();
		
		return $hit->save();
	}
}