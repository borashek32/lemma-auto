<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $duplicates = Cart::search(function($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->product_id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')
                ->with('error', 'Товар уже есть в вашей корзинею Для того, чтобы изменить количество, перейдите в корзину');
        }

        $product    = Product::where('number', $request->code)->first();
        if (!$product) {
            $product = new Product();
            $product->goodsID        = $request->goodsID;
            $product->number         = $request->code;
            $product->brand          = $request->brand;
            $product->price          = $request->price;
            $product->name           = $request->title;
            $product->count          = $request->stock_quantity;
            $product->save();
        }
        
        Cart::add(
            $product->id,
            $request->title,
            1,
            $request->price,
            [
                'stock_quantity' => $request->stock_quantity,
                'number'         => $request->code,
                'brand'          => $request->brand,
                'name'           => $request->title,
                'goodsID'        => $product->goodsID,
                'shipment_date'  => $request->shipment_date
            ]
        )->associate('App\Models\Product');
// dd(Cart::content());
        return redirect()
            ->route('cart.index')
            ->with('success', 'Товар успешно добавлен в вашу корзину');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            session()->flash('error', 'Количество не должно превышать остаток на складе');
            return response()->json(['success' => false], 400);
        }

        Cart::update($id, $request->quantity);

        session()->flash('success', 'Количество товара успешно обновлено');
        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('success', 'Товар был успешно удален из корзины');
    }
}
