<?php

namespace App\Http\Controllers;

use App\Models\Autopart;
use App\Models\Section;
use Illuminate\Http\Request;

class AutopartController extends Controller
{
    public function autoparts()
    {
        $search = request()->query('search');
        if ($search) {
            $autoparts = Autopart::where('title', 'LIKE', "%{$search}%")
                ->orWhere('number', 'LIKE', "%{$search}%")
                ->latest()
                ->paginate(6);
        } else {
            $autoparts = Autopart::latest()->paginate(6);
            $autoparts->withPath('/auto-parts');
        }

        return view('shop.autoparts', compact('autoparts', 'search'));
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
