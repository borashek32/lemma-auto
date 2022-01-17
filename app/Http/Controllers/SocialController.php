<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function github()
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubRedirect()
    {
        $user = Socialite::driver('github')->user();
        $user = User::where('email', $user->email)->first();
        Auth::login($user, true);

        return redirect('/dashboard');
    }

    public function vkontakte()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function vkontakteRedirect()
    {
        $user = Socialite::driver('vkontakte')->user();
        $user = User::where('email', $user->email)->first();
        Auth::login($user, true);

        return redirect('/dashboard');
    }

    public function facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookRedirect()
    {
        $user = Socialite::driver('facebook')->user();
        $user = User::where('email', $user->email)->first();
        Auth::login($user, true);

        return redirect('/dashboard');
    }

    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleRedirect()
    {
        $user = Socialite::driver('google')->user();
        $user = User::where('email', $user->email)->first();
        Auth::login($user, true);
        
        return redirect('/dashboard');
    }
}
