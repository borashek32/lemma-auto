<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidatePostForm;
use App\Mail\MailingNews;
use App\Models\Category;
use App\Models\Mailing;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;
use Spatie\Tags\Tag;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function updatedTitle($value)
    {
        $this->slug = SlugService::createSlug(Post::class, 'slug', $value);
    }

    public function index()
    {
        $categories = Category::all();
        $search = request()->query('search');
        if ($search) {
            $posts = Post::where('title', 'LIKE', "%{$search}%")
                ->orWhere('page_text', 'LIKE', "%{$search}%")
                ->latest()
                ->paginate(6);
        } else {
            $posts = Post::latest()->paginate(6);
            $posts->withPath('/dashboard/posts');
        }

        return view('admin.posts.index', compact('posts', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.posts.create', [
            'categories' => $categories
        ]);
    }

    public function store(ValidatePostForm $request)
    {
        $post = Post::create([
            'img'         => $request->img,
            'category_id' => $request->category_id,
            'title'       => $request->title,
            'page_text'   => $request->page_text
        ]);
        $tags = explode(',', $request->tags);
        $post->attachTags($tags);

        $mailings = Mailing::all();
        foreach ($mailings as $mailing) {
            Mail::to($mailing->email)->send(new MailingNews($post));
        }

        return redirect('/dashboard/posts')
            ->with('success', 'Новый пост был успешно добавлен');
    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = $post->tags->pluck('name');
        foreach ($tags as $key => $arg) {
            $results[] = $arg;
        }
        $tags = implode(',', $results);

        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    public function update(ValidatePostForm $request, Post $post)
    {
        $post->category_id   =  $request->category_id;
        $post->img           =  $request->img;
        $post->title         =  $request->title;
        $post->page_text     =  $request->page_text;
        $post->save();

        $tags = explode(',', $request->tags);
        $post->syncTags($tags);


        return redirect('dashboard/posts')
            ->with('success', 'Новый пост был успешно обновлен.');
    }

    public function destroy(Post $post)
    {
       $post->delete();

        return redirect('dashboard/posts')
            ->with('success', 'Пост был успешно успешно удален.');
    }

    public function postsByTag($slug)
    {
        $tag = Tag::findFromSlug($slug);
        $posts = Post::withAnyTags([$tag])->get();

        return view('posts.posts-by-tags', compact('posts', 'tag'));
    }
}
