<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCompleted extends Mailable
{
    public $order;

    use Queueable, SerializesModels;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function build()
    {
        return $this->subject('Ваш заказ на сайте Lemma-Auto.ru готов к выдаче')->
        from('mail@lemma-auto.ru')->markdown('emails.order-completed')
            ->with('order', [$this->order]);
    }
}
