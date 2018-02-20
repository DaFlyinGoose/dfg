<?php

namespace App\Console;

use Illuminate\Console\Command;
use EmailService;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class CronSubscribed extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'cron:subscribed';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Subscribes email addresses from mailchimp';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
    public function __construct()
    {
        parent::__construct();
    }

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
        $emails = '';
		$count = app('EmailService')->subscribersCron($this->option('pretend'));
		
		$return = ' users were subscribed';
		
		if ($count > 0)
		{
			if ($this->option('pretend') || config('mail.driver') == 'log')
			{	
				$emails = ', no emails were sent';
			}
			elseif ($count > 0 && !$this->option('pretend'))
			{
				$emails = ', emails were sent';
			}

			if($count == 1)
			{
				$return = ' user was subscribed';
			}
			
			$return = $count . $return . $emails;
			
			$this->info($return);
		}
		else
		{
			$return = 'No' . $return;

			$this->info($return);
		}
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array();
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('pretend', null, InputOption::VALUE_NONE , 'Disables the mail function whilst still adding users to the system', null),
		);
	}

}
