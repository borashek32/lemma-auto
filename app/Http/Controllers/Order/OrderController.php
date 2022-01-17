<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateOrderForm;
use App\Mail\OrderNotification;
use App\Mail\OrderPlaced;
use App\Models\Contact;
use App\Models\OrderProduct;
use App\Models\Payment;
use Cart;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function shipment()
    {
//        dd(Cart::content());
        $contacts  = Contact::all();
        $payments  = Payment::all();
        $user      = Auth::user();

        return view('cart.order', compact('contacts', 'payments', 'user'));
    }

    public function store(Request $request)
    {

        $order = new Order();
        $order->order_number      = uniqid('LA-');
        $order->status            = 'в работе';
        $order->total             = Cart::total();
        $order->product_count     = Cart::count();
        $order->contact_id        = $request->contact_id;
        $order->payment_id        = $request->payment_id;
        $order->user_id           = auth()->id();
        $order->save();

        $cartProducts = Cart::content();
        foreach ($cartProducts as $item)
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'required_product_quantity' => $item->qty,
                'shipment_date' => $item->options->shipment_date
            ]);
//            $order->products()->attach($item->id);

        Cart::destroy();

        Mail::to($request->user())->send(new OrderPlaced($order));
        Mail::to("borashek@inbox.ru")->send(new OrderNotification($order));

        return redirect()->route('auto-parts')->with('success', 'Ваш заказ был успешно размещен');
    }
}
