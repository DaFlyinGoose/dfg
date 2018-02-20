<?php namespace Services\Email;

use App\Mail\Subscribed;
use Models\Email;
use Models\EmailGroups;
use \Mailchimp;
use \Mail;

/**
* Our PokemonService, containing all useful methods for business logic around Pokemon
*/
class EmailService
{
    protected $subscriberListId = 'f960c71c6b';

    protected $mailchimp;

    public function __construct(Mailchimp $mailchimp)
    {
        $this->mailchimp = $mailchimp;
    }

    public function subscribersCron($pretend)
    {
		$mailchimpLists = $this->mailchimp->lists;
		$mailchimpLists->master->ssl_verifypeer = false;
        $members = $mailchimpLists->members($this->subscriberListId, array());
        $count = 0;
        foreach ($members['data'] as $member)
		{
            if (!Email::where('email', $member['email'])->first())
            {
                $this->addEmail($member['email'], 'subscribers');
                $member['email'] = 'chris@dfg.gd';
				if ($pretend != true)
				{
                    Mail::to($member['email'])->send(new Subscribed());
				}
                
                $count++;
            }
        }
        
        return $count;
    }

    public function addEmail($email, $group)
    {
        if ($this->isGroup($group))
        {
            if (is_numeric($group))
            {
                $groupId = $group;
            }
            else
            {
                $group = $this->getGroupByName($group);
                $groupId = $group->id;
            }
        }
        else
        {
            if (!is_numeric($group))
            {
                $group = $this->addGroup($group);
                $groupId = $group->id;
            }
            else
            {
                return false;
            }
        }

        $email = $this->parseEmail($email);
        $email['group_id'] = $groupId;

        if ($this->isEmail($email['email']))
        {
            return $this->getEmailByEmail($email['email']);
        }
        else
        {
            if ($email['name'] == null)
            {
                $email['name'] = $email['email'];
            }

            return Email::create($email);
        }

        return false;
    }

    public function isEmail($email)
    {
        $email = Email::where('email', $email)->first();

        if ($email != null)
        {
            return true;
        }

        return false;
    }

    public function isGroup($name)
    {
        if (is_numeric($name))
        {
            $group = $this->getGroupById($name);
        }
        else
        {
            $group = $this->getGroupByName($name);
        }

        if ($group != null)
        {
            return true;
        }

        return false;
    }

    public function getGroupById($id)
    {
        $group = EmailGroups::find($id);

        if ($group == null)
        {
            return false;
        }

        return $group;
    }

    public function getGroupByName($group)
    {
        $group = EmailGroups::where('name', $group)->first();

        if ($group == null)
        {
            return false;
        }

        return $group;
    }

    public function getEmailById($id)
    {
        $email = Email::find($id);

        if ($email != null)
        {
            return $email;
        }

        return false;
    }

    public function getEmailByEmail($email)
    {
        $email = Email::where('email', $email);

        if ($email != null)
        {
            return $email->first();
        }

        return false;
    }

    protected function parseEmail($email)
    {
        $emailArr = array(
            'email' => null,
            'name' => null
        );

        if (is_string($email))
        {
            if ($this->validateEmail($email))
            {
                return array_merge($emailArr, array('email' => $email));
            }
        }
        if (is_array($email))
        {
            foreach ($email as $mail)
            {
                if ($this->validateEmail($mail))
                {
                    $emailArr['email'] = $mail;
                    break;
                }
            }
            if (isset($email['name']))
            {
                $emailArr['name'] = $email['name'];
            }

            return $emailArr;
        }

        return false;
    }

    protected function validateEmail($email)
    {
        $validator = \Validator::make(array('email' => $email), array('email' => 'required|email'));
        if ($validator->fails())
        {
            return false;
        }

        return true;
    }
}