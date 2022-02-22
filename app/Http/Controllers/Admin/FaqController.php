<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateFaqForm;
use Illuminate\Support\Facades\Mail;
use App\Mail\FaqAnswered;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\User;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        $search = request()->query('search');
        if ($search) {
            $faqs = Faq::where('question', 'LIKE', "%{$search}%")
                ->orWhere('answer', 'LIKE', "%{$search}%")
                ->latest()
                ->paginate(6);
        } else {
            $faqs = Faq::latest()->paginate(6);
            $faqs->withPath('/dashboard/faqs');
        }

        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(ValidateFaqForm $request)
    {
        $faq = Faq::create([
            'question'       => $request->question,
            'answer'         => $request->answer,
            'user_id'        => 1
        ]);

        return redirect('/dashboard/posts')
            ->with('success', 'Новый вопрос был успешно добавлен');
    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', [
            'faq' => $faq
        ]);
    }

    public function update(ValidateFaqForm $request, Faq $faq)
    {
        // dd($request->all());
        $faq->question         =  $request->question;
        $faq->answer           =  $request->answer;
        $faq->save();

        $user  = User::where('id', $request->user_id)->first();
        $email = $user->email;
        Mail::to($email)->send(new FaqAnswered($faq));
        
        return redirect('dashboard/faqs')
            ->with('success', 'Вопрос пользователя был успешно обновлен. Ответ направлен не его почту.');
    }

    public function destroy(Post $post)
    {
       $post->delete();

        return redirect('dashboard/posts')
            ->with('success', 'Вопрос был успешно успешно удален.');
    }
}
