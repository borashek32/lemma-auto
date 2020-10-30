<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutopartsController extends Controller
{
    public function autoparts()
    {
        return view('shop.autoparts');
    }

    public function law()
    {
        return view('shop.law');
    }

    public function partners()
    {
        return view('shop.partners');
    }

}
