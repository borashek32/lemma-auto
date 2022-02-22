<?php

namespace App\Mail;

use App\Models\Faq;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FaqAnswered extends Mailable
{
    use Queueable, SerializesModels;

    public $faq;

    public function __construct(Faq $faq)
    {
        $this->faq = $faq;
    }

    public function build()
    {
        return $this->subject('Ответ на ваш вопрос на сайте lemma-auto.ru')
            ->from('mail@lemma-auto.ru')
            ->markdown('emails.faq-answered')
            ->with('faq', [$this->faq]);
    }
}
