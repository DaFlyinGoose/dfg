<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Newsletter extends Mailable
{
    use Queueable, SerializesModels;

    protected $articleForwards;
    protected $newsletter;
    protected $email;

    /**
     * Create a new message instance.
     *
     * @param $email
     * @param $articleForwards
     * @param $newsletter
     */
    public function __construct($articleForwards, $newsletter, $email)
    {
        $this->articleForwards = $articleForwards;
        $this->newsletter = $newsletter;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject($this->newsletter->subject);

        return $this->view('emails.newsletter')->with([
                'articleForwards' => $this->articleForwards,
                'newsletter' => $this->newsletter,
                'email' => $this->email,
            ]);
    }
}
