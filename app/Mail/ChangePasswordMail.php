<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ChangePasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $data=[];
    protected $messageSubject;
    protected $sentFromMail;
    protected $sentFromName;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data=[],$messageSubject,$sentFromMail,$sentFromName)
    {
        $this->data             = $data;
        $this->messageSubject   = $messageSubject;
        $this->sentFromMail     = $sentFromMail;
        $this->sentFromName     = $sentFromName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.change-password')->subject($this->messageSubject)->from($this->sentFromMail, $this->sentFromName)->with('data', $this->data)->with('sentFromName',$this->sentFromName);
    }
}
