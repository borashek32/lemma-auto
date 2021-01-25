<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function contacts()
    {
        return view('profile.contacts');
    }
}
