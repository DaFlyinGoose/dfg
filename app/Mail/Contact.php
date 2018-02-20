<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    protected $input;

    /**
     * Create a new message instance.
     *
     * @param $input
     * @param $replyTo
     */
    public function __construct($input)
    {
        $this->input = $input;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->replyTo($this->input['email']);
        $this->subject('DFG Contact Email');

        return $this->view('emails.contact')->with($this->input);
    }
}
