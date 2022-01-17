<?php

namespace App\Http\Controllers;

use App\Models\Mailing;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function orders()
    {
        $orders = Order::all();

        return view('profile.orders', compact('orders'));
    }

    public function orderDetails($id)
    {
        $order = Order::where('id', $id)->first();

        return view('profile.order', compact('order'));
    }

    public function contacts()
    {
        return view('profile.contacts');
    }

    public function welcome()
    {
        return view('profile.welcome');
    }
}
