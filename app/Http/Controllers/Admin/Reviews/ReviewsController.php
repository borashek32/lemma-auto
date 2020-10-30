<?php

namespace App\Http\Controllers\Admin\Reviews;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function index()
    {
        return view('admin.reviews.index', ['reviews' => Review::all()]);
    }


    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()->route('admin.reviews')->with('success', 'Отзыв удален успешно');
    }
}
