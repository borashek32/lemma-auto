<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Mail\OrderCompleted;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdminOrderController extends Controller
{
    public function index()
    {
        $search = request()->query('search');
        if ($search) {
            $orders = Order::where('order_number', 'LIKE', "%{$search}%")
                ->latest()
                ->paginate(10);
        } else {
            $orders = Order::latest()->paginate(10);
            $orders->withPath('/dashboard/orders');
        }

        return view('admin.orders.index', compact('orders'));
    }

    public function orderStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('orders')->where('id', $request->id)
                ->update(['status' => 'выполнен']);

            $order = Order::where('id', $request->id)->first();
            $user  = User::where('id', $order->user_id)->first();
            Mail::to($user)->send(new OrderCompleted($order));

            return response()->json([
                'message' => 'готов и находится в пункте выдачи',
                'status' => true
            ]);
        }
        else {
            DB::table('orders')->where('id', $request->id)
                ->update(['status' => 'в работе']);
        }
        return response()->json([
            'message' => 'не укомплектован',
            'status' => false
        ]);
    }

    public function destroy($id)
    {
        $order = Order::find($id)->first();
        $order->delete();

        return redirect('dashboard/admin-orders')
            ->with('success', 'Заказ успешно удален');
    }
}
