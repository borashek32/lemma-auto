<?php

namespace App\Http\Controllers;

use App\Mail\CallMail;
use App\Mail\ContactMail;
use App\Models\Member;
use App\Models\Post;
use App\Models\Category;
use App\Models\Payment;
use App\Models\Tag;
use App\Models\Faq;
use App\Models\Delivery;
use App\Models\Requisite;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function delivery()
    {
        $deliveries = Delivery::all();
        return view('site.delivery', compact('deliveries'));
    }

    public function payment()
    {
        $payments = Payment::all();
        return view('site.payment', compact('payments'));
    }
    
    public function dashboard()
    {
        return view('profile.show');
    }

    public function main()
    {
        return view('site.main');
    }

    public function contact()
    {
        return view('site.contact');
    }

    public function aboutUs()
    {
        $members = Member::get();

        return view('site.about-us', compact('members'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email'   => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'subject' => ['required', 'string', 'max:50'],
            'message' => ['required', 'string', 'max:500'],
        ]);
    }

    public function submit(Request $data)
    {
        $data = array(
            'name' => $data->name,
            'email' => $data->email,
            'message' => $data->message,
        );

        Mail::to("borashek@inbox.ru")->send(new ContactMail($data));

        return redirect()->back()->with('success', 'Ваше сообщение успешно отправлено.');
    }
    
    public function requisites()
    {
        $requisites = Requisite::get();

        return view('site.requisites', compact('requisites'));
    }
    
    public function sitemap()
    {
        $posts = Post::orderBy('updated_at', 'DESC')->get();
        $categories = Category::orderBy('updated_at', 'DESC')->get();
        $tags = Tag::orderBy('created_at', 'DESC')->get();

        return response()->view('sitemap', compact('posts', 'categories', 'tags'))
            ->header('Content-Type', 'text/xml');
    }

    public function orderCall(Request $request)
    {
        $request = array(
            'name' => $request->name,
            'phone' => $request->phone
        );

        Mail::to("borashek@inbox.ru")->send(new CallMail($request));

        return response()->json([
            'status'   => 200,
            'message'  => 'New student added successfully'
        ]);
        // return redirect()->back()->with('success', 'Обратный звонок успешно заказан.');
    }

    // public function error()
    // {
    //     return view('site.error');
    // }
}
