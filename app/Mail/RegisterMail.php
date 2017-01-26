<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    private $link,$link2;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($link,$link2)
    {
        //
        $this->link = $link;
        $this->link2 = $link2;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_ALIAS', null))
            ->subject('Registra la tua mail')
            ->view('emails.register', ['link' => $this->link, 'link2' => $this->link2]);
    }
}
