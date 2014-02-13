<?php namespace Services;

use \Eloquent;

class Newsletter
{
    public function sendNewsletter(Eloquent $newsletter)
    {
        $articles = $newsletter->groupArticles();
        
        $emailGroups = $newsletter->emailGroups()->get();
        
        $emails = array();
        foreach ($emailGroups as $emailGroup)
        {
            foreach ($emailGroup->emails()->get() as $email)
            {
                $articleForwards = array();
                foreach ($articles as $key => $article)
                {
                    $articleForwards[$key] = array('forward' => $this->createForward($article, $email), 'article' => $article);
                }
                
                \Mail::send('emails.newsletter', $articleForwards, function($message) use ($email, &$newsletter)
                {
                    $message->to($email->email, $email->name)->subject($newsletter->subject);
                });
            }
        }
    }
    
    protected function createForward($article, $email)
    {
        $forwardAttr = array(
            'url' => $article->url,
            'email_id' => $email->id,
        );
        
        $i = 0;
        while($i == 0)
        {
            $str = $this->generateStr(5);
            if (!\Forward::where('forward', $str)->first())
            {
                $forwardAttr['forward'] = $str;
                $i = 1;
            }
        }
        
        \Forward::create($forwardAttr);
        
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
