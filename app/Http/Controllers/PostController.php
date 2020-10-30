<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function blog()
    {
        return view('blog.blog', ['posts' => Post::all()]);
    }
}
