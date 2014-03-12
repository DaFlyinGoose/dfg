<?php namespace Repositories\Email;

use Illuminate\Database\Eloquent\Model;
use Validator;

class EmailRepository implements EmailInterface
{
    protected $emailModel;
    protected $emailGroupModel;
    
    public function __construct(Model $emailModel, Model $emailGroupModel)
    {
        $this->emailModel = $emailModel;
        $this->emailGroupModel = $emailGroupModel;
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
    
    public function isEmail($email)
    {
        $email = $this->emailModel->where('email', $email)->first();
        
        if ($email != null)
        {
            return true;
        }
        
        return false;
    }
    
    public function addGroup($group)
    {
        if ($this->isGroup($group))
        {
            return $this->getGroupByName($group);
        }
        else
        {
			$group = array('name' => $group);
			
            return $this->emailGroupModel($group);
        }
        
        return false;
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
			
            return $this->emailModel->create($email);
        }
        
        return false;
    }
    
    public function getGroupById($id)
    {
        $group = $this->emailGroupModel->find($id);
        
        if ($group == null)
        {
            return false;
        }
        
        return $group;
    }
    
    public function getGroupByName($group)
    {
        $group = $this->emailGroupModel->where('name', $group)->first();
        
        if ($group == null)
        {
            return false;
        }
        
        return $group;
    }
    
    public function getEmailById($id)
    {
        $email = $this->emailModel->find($id);
        
        if ($email != null)
        {
            return $email;
        }
        
        return false;
    }
    
    public function getEmailByEmail($email)
    {
        $email = $this->emailModel->where('email', $email);
        
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
        $validator = Validator::make(array('email' => $email), array('email' => 'required|email'));
        if ($validator->fails())
        {
            return false;
        }
        
        return true;
    }
}