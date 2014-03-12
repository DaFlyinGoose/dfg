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
    
    public function subscribersCron()
    {
        $members = MailchimpWrapper::lists()->members($this->subscriberListId, array());
        print_r($members);
        $count = 0;
        foreach ($members['data'] as $member)
        {
            if (!$this->emailRepo->isEmail($member['email']))
            {
                print_R($member['email']);
                $this->emailRepo->addEmail($member['email'], 'subscribers');
                
                Mail::send('emails.subscribed', array(), function($message)
                {
                    $message->to('c.goosey.uk@googlemail.com', 'John Smith')->subject('Welcome!');
                });
                
                $count++;
            }
        }
        
        return $count;
    }    
}