<?php namespace Services;

class DatesService
{
	public function friendlyDate($date)
	{
		return $this->friendlyAge(time() - strtotime($date));
	}
	
	protected function friendlyAge($past)
	{
		$minute = 60;
		$hour = ($minute * 60);
		$day = ($hour * 24);
		$week = ($day * 7);
		$year = ($day * 365);
		$month = ($year / 12);
		
		$times = array(
			'hours' => array($hour, $day, 'An hour ago', ' hours ago'),
			'days' => array($day, $week, 'Yesterday', ' days ago'),
			'weeks' => array($week, $month, 'Last Week', ' weeks ago'),
			'months' => array($month, $year, 'Last Month', ' months ago'),
			'years' => array($year, ($year * 30), 'Last Year', ' years ago'),
		);
		
		foreach ($times as $time)
		{
			$str = $this->pastWording($past, $time[0], $time[1], $time[2], $time[3]);
			if ($str)
			{
				break;
			}
		}
		if ($str == false)
		{
			if ($past < $hour)
			{
				$minutes = ceil($past / $minute);
				if ($minutes >= 10)
				{
					return (ceil($minutes / 10) * 10) . ' minutes ago' ;
				}
				elseif ($minutes > 0)
				{
					return $minutes . ' minutes ago';
				}
				elseif ($past < 0)
				{
					return 'From the Future!';
				}
				return 'About a minute ago';
			}
		}
		
		return $str;
	}
	
	protected function pastWording($past, $lessThan, $moreThan, $singular, $plural)
	{
		if ($lessThan < $past && $past < $moreThan)
		{
			$time = ceil($past / $lessThan);
			if ($time == 1)
			{
				return $singular;
			}
			
			return $time . $plural;
		}
		
		return false;
	}
}