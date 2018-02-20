<?php namespace Services;
use \Models\Forward;

use \Eloquent;
use \Mail;
use \App\Mail\Newsletter as NewsletterEmail;

class Newsletter
{
    public function sendNewsletter($newsletter)
    {
        $articleGroup = $newsletter->groupArticles();
        
        $emailGroups = $newsletter->emailGroups()->get();
        
        $emails = array();
        foreach ($emailGroups as $emailGroup)
        {
            foreach ($emailGroup->emails()->get() as $email)
            {
                $this->emailNewsletter($newsletter, $articleGroup, $email);
            }
        }
    }
    
    public function emailNewsletter($newsletter, $articleGroup, $email)
    {
        $articleForwards = array();
        foreach ($articleGroup as $group => $articles)
        {
            foreach ($articles as $key => $article) {
                $articleForwards[$group][$key] = array('forward' => $this->createForward($article, $email), 'article' => $article);
            }
        }

        Mail::to($email->email, $email->name)->send(new NewsletterEmail($articleForwards, $newsletter, $email->email));
    }
    
    protected function createForward($article, $email)
    {
        $forwardAttr = array(
            'url' => $article->url,
            'email_id' => $email->id,
            'article_id' => $article->id,
        );
        
        $i = 0;
        while($i == 0)
        {
            $str = $this->generateStr(5);
            if (!Forward::where('forward', $str)->first())
            {
                $forwardAttr['forward'] = $str;
                $i = 1;
            }
        }
        
        Forward::create($forwardAttr);
        
        return $str;
    }
    
    protected function generateStr($len)
    {
        $char = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $i = 1;
        $str = rand(0,9);
        
        while($i < $len)
        {
            $str .= substr($char, rand(0, strlen($char)), 1);
            $i++;
        }
        
        return $str;
    }
}
?>
