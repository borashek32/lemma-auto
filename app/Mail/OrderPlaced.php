<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderPlaced extends Mailable
{
    public $order;

    use Queueable, SerializesModels;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function build()
    {
        return $this->subject('Ваш заказ на сайте Lemma-Auto')->
        from('mail@lemma-auto.ru')->markdown('emails.order-placed')
            ->with('order', [$this->order]);
    }
}
