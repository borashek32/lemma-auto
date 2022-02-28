<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Post;
use App\Models\Law;
use App\Models\Article;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Auth;

class AutopartController extends Controller
{
    public function search(Request $request)
    {
        $articles = Article::all();
        $search = $request->input('search');

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
            if (!$product->warehouses) {
                $products = Product::where('number', 'LIKE', "%{$search}%")
                    ->orWhere('name', 'LIKE', "%{$search}%")
                    ->latest()
                    ->paginate(15);
            }
        }

        if (!Auth::user()) {
            foreach ($products as $product) {
                $product->price = round($product->price + $product->price * 20 / 100, 2); //нет status_id user не вошел на сайт
            }
        }
        elseif (Auth::user()->status_id == 1) {
            foreach ($products as $product) {
                $product->price = round($product->price + $product->price * 20 / 100, 2); //физ лица
            }
        }
        elseif (Auth::user()->status_id == 2) {
            foreach ($products as $product) {
                $product->price = round($product->price + ($product->price * 10 / 100), 2); //юр лица
            }
        }
        elseif (Auth::user()->margin) {
            $user_margin = Auth::user()->margin;
            foreach ($products as $product) {
                $product->price = round($product->price + ($product->price * $user_margin / 100), 2); //индивидуальная наценка
            }
        } 
    // dd($products);
        return view('shop.autoparts', compact('products', 'search', 'articles')); 
    }

    public function autoparts(Request $request)
    {
        $search = $request->input('search');
        $articles = Article::all();
        $post = Post::where('id', 1)->first();
        return view('shop.autoparts', compact('search', 'post', 'articles'));
    }
    
    public function laws()
    {
        $laws = Law::all();
        return view('shop.laws.laws', compact('laws'));
    }

    public function law($slug)
    {
        $law = Law::where('slug', $slug)->first();
        return view('shop.laws.law', compact('law'));
    }

    public function partners()
    {
        $advertisements = Advertisement::all();
        return view('shop.partners', compact('advertisements'));
    }
}
