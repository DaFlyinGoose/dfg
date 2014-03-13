<?php namespace Services\Email;

use Repositories\Email\EmailInterface;
use \MailchimpWrapper;
use \Mail;

/**
* Our PokemonService, containing all useful methods for business logic around Pokemon
*/
class EmailService
{
    // Containing our pokemonRepository to make all our database calls to
    protected $emailRepo;
    protected $subscriberListId = 'f960c71c6b';
    
    /**
    * Loads our $pokemonRepo with the actual Repo associated with our pokemonInterface
    * 
    * @param pokemonInterface $pokemonRepo
    * @return PokemonService
    */
    public function __construct(EmailInterface $emailRepo)
    {
        $this->emailRepo = $emailRepo;
    }
    
    public function subscribersCron($pretend)
    {
		$mailchimpLists = MailchimpWrapper::lists();
		$mailchimpLists->master->ssl_verifypeer = false;
        $members = $mailchimpLists->members($this->subscriberListId, array());
        $count = 0;
        foreach ($members['data'] as $member)
		{
            if (!$this->emailRepo->isEmail($member['email']))
            {
                $this->emailRepo->addEmail($member['email'], 'subscribers');
                
				if ($pretend != true)
				{
					Mail::send('emails.subscribed', array(), function($message) use ($member)
					{
						$message->to($member['email'])->subject('Welcome!');
					});
				}
                
                $count++;
            }
        }
        
        return $count;
    }    
}