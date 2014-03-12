<?php namespace Repositories\Email;

interface EmailInterface
{
    public function isGroup($name);
    
    public function isEmail($email);
    
    public function addEmail($email, $group);
    
    public function addGroup($group);
    
    public function getGroupById($id);
    
    public function getGroupByName($group);
    
    public function getEmailById($id);
    
    public function getEmailByEmail($email);
}
?>
