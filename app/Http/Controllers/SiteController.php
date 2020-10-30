<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SiteController extends Controller
{

    public function main()
    {
        return view('main');
    }


    public function before()
    {
        return view('site.before');
    }


    public function services()
    {
        return view('site.services');
    }


    public function possibilities()
    {
        return view('site.possibilities');
    }


    public function contact()
    {
        return view('contact');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'subject' => ['required', 'string', 'max:50'],
            'message' => ['required', 'string', 'max:500'],
        ]);
    }


    public function submit(Request $data)
    {

        $data = array(
            'name' => $data->name,
            'email' => $data->email,
            'subject' => $data->subject,
            'message' => $data->message,
        );

        Mail::to("borashek@inbox.ru")->send(new ContactMail($data));

        return redirect()->back()->with('success', 'Ваше сообщение успешно отправлено.');
    }
}
