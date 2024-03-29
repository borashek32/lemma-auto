<?php

namespace App\Http\Controllers;

use App\Models\Mailing;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MailingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
//        $mailings = Mailing::where('user_id', Auth::user()->id);

        return view('profile.mailings.index', compact('user'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $new_email = $request->email;
        if ($user->mailings) {
            foreach ($user->mailings as $mailing) {
                if ($mailing->email == $new_email) {
                    return back()->with('error', 'Такой электронный адрес уже есть в списке рассылки');
                }
            }
            Mailing::create([
                'user_id'   => Auth::user()->id,
                'email'     => $request->email
            ]);
        }
        return back()->with('success', 'Ваш адрес успешно добавлен в список рассылки');
    }

    public function destroy(Mailing $mailing)
    {
        $mailing->delete();

        if (session()->has('error')) {
            return back()->with('error', 'Что-то пошло не так');
        }

        return back()->with('success', 'Вы успешно отписались от рассылки');
    }
}
