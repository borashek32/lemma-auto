<?php

namespace App\Jobs;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class OrderMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order;
    protected $user;
    
    public function __construct($order, $user)
    {
        $this->order = $order;
        $this->user  = $user;
    }

    public function handle(Request $request)
    {
        Mail::to($this->user)->send(new OrderPlaced($this->order));
        Mail::to("borashek@inbox.ru")->send(new OrderNotification($this->order));
    }
}
