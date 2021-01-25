<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;

class PostController extends Controller
{
    public function blog()
    {
        $categories = Category::all();
        $search = request()->query('search');
        if ($search) {
            $posts = Post::where('body', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%")
                ->latest()
                ->simplePaginate(6);
        } else {
            $posts = Post::latest()->simplePaginate(6);
            $posts->withPath('/auto-magazine');
        }
        return view('blog.blog', compact('categories', 'posts'));
    }

    public function post(Post $id)
    {
        $post = Post::find($id)->first();
        $categories = Category::all();

        return view('blog.post', compact('post', 'categories'));
    }

//    public function __construct()
//    {
//        $this->middleware('auth')->except('post');
//    }

    public function addComment(Request $request)
    {
        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $request->get('post_id');
        $comment->body = $request->input('body');
        $comment->save();

        return back()->with('success', 'Ваш комментарий опубликован');
    }
}
