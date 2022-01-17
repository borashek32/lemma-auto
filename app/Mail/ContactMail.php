<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Contact;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('Новое письмо на сайте Lemma-Auto')->
        from('mail@lemma-auto.ru')->markdown('emails.dynamic_email_template')
            ->with('data', [$this->data]);
    }
}
