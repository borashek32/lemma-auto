<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;

class ReviewController extends Controller
{
    public function reviewsPost()
    {
        $reviews = Review::latest()->paginate();

        return view('site.reviews', ['reviews' => $reviews]);
    }


    public function reviewsWrite(Request $req)
    {
        $review          = new Review();
        $review->user_id = auth()->user()->id;
        $review->body    = $req->input('body');
        $review->save();

        return redirect('reviews')->with('success', 'Ваше сообщение опубликовано');
    }
}
