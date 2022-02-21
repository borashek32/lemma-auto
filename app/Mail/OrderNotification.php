<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\UserRequisites;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class OrderNotification extends Mailable
{
    public $order;

    use Queueable, SerializesModels;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function build()
    {
//        $user_id = $this->order->user_id;
        $status_id = Auth::user()->status_id;
        if ($status_id == 2) {
            $user_requisites = UserRequisites::where('user_id', $this->order->user_id)->first();
            return $this->subject('Новый заказ на сайте Lemma-Auto')
                ->from('mail@lemma-auto.ru')
                ->markdown('emails.order-notification')
                ->attach(public_path('users-requisites') . '/' . $user_requisites->path, [
                    'as' => $user_requisites->original_name
                ])
                ->with('order', [$this->order]);
        } else {
            return $this->subject('Новый заказ на сайте Lemma-Auto')
                ->from('mail@lemma-auto.ru')
                ->markdown('emails.order-notification')
                ->with('order', [$this->order]);
        }
    }
}
