<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Support\Facades\Validator;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function faq()
    {
        $faqs = Faq::all();
        return view('site.faqs.faq', compact('faqs'));
    }

    public function faqWrite(Request $req)
    {
        // dd($req->all());
        $faq              = new Faq();
        $faq->user_id     = auth()->user()->id;
        $faq->question    = $req->input('question');
        $faq->save();

        return redirect('faq')->with('success', 'Ваш вопрос отправлен техническому специалисту');
    }

    public function updatedTitle($value)
    {
        $this->slug = SlugService::createSlug(Faq::class, 'slug', $value);
    }

    public function question($slug)
    {
        $faq = Faq::where('slug', $slug)->first();

        return view('site.faqs.faq-one', compact('faq'));
    }
}
