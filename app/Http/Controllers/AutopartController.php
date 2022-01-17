<?php

namespace App\Http\Controllers;

use App\Models\Product;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\Advertisement;

class AutopartController extends Controller
{
    public function autoparts(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $client = new Client([
                'base_uri' => 'http://api.favorit-parts.ru/hs/hsprice/',
                'timeout'  => 2.0,
            ]);

            $query = [
                'key'    => '30D2E199-5AAE-4837-AABD-74518EE085FD',
                'number' => $search
            ];

            $response = $client->request('GET', '', [
                'query' => $query
            ]);

            $object = json_decode($response->getBody()->getContents());
            $tmp = (object)$object;
            $products = $tmp->goods;
            foreach ($products as $product) {
                $product->price = $product->price + $product->price * 20 / 100;

//                foreach ($product->warehouses as $warehouse) {
//                    if ($warehouse->own !== null) {
//                        $shipment_date = $warehouse->shipmentDate;
//                    }
//                    echo $shipment_date;
//                }
            }
            return view('shop.autoparts', compact('products', 'search'));
        } else {

            return view('shop.autoparts', compact('search'));
        }
    }

    public function law()
    {
        return view('shop.law');
    }

    public function partners()
    {
        $advertisements = Advertisement::all();
        
        return view('shop.partners', compact('advertisements'));
    }
}
