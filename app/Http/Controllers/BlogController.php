<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BlogController extends Controller
{
    public function blog()
    {
        $search = request()->query('search');
        if ($search) {
            $posts = Post::where('page_text', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%")
                ->latest()
                ->paginate(6);
        } else {
            $posts = Post::latest()->paginate(6);
            $posts->withPath('/auto-magazine');
        }

        return view('blog.blog', compact( 'posts'));
    }

    public function onePost($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('blog.post-one', compact('post'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $search = request()->query('search');
        if ($search) {
            $posts = Post::where('body', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%")
                ->latest()
                ->paginate(6);
        } else {
            $posts = Post::latest()->paginate(6);
            $posts->withPath('/auto-magazine');
        }

        return view('blog.one-cat', compact('posts', 'category'));
    }

    public function addComment(Request $request)
    {
        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $request->get('post_id');
        $comment->body = $request->input('body');
        $comment->save();

        return back()->with('success', 'Ваш комментарий опубликован');
    }

    public function reply(Request $request)
    {
        $reply = new Reply();
        $reply->user_id = auth()->user()->id;
        $reply->comment_id = $request->get('comment_id');
        $reply->post_id = $request->get('post_id');
        $reply->comment_author_email = $request->get('comment_author_email');
        $reply->body = $request->input('body');
        $reply->save();

        Mail::send(['text' => 'emails.dynamic_email_get-replies'], ['reply' => $reply], function ($message) use ($reply) {
            $message->to($reply->comment_author_email)->subject('Получен новый ответ на ваш комментарий на сайте Лемма-авто');
            $message->from('lemmaauto@gmail.com', 'Лемма-авто');
        });

        return back()->with('success', 'Ваш ответ опубликован');
    }
}
