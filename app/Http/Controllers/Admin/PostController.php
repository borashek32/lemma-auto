<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidatePostForm;
use App\Models\Category;
use App\Models\Post;
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
            $posts = Post::where('page_text', 'LIKE', "%{$search}%")
                ->orWhere('title', 'LIKE', "%{$search}%")
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
        Post::create([
            'img' => $request->img,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'page_text' => $request->page_text
        ]);

        return redirect('/dashboard/posts')
            ->with('success', 'Новый пост был успешно добавлен.');
    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function update(ValidatePostForm $request, Post $post)
    {
        $post->category_id = $request->category_id;
        $post->img =  $request->img;
        $post->title =  $request->title;
        $post->page_text = $request->page_text;
        $post->save();

        return redirect('dashboard/posts')
            ->with('success', 'Новый пост был успешно обновлен.');
    }

    public function destroy(Post $post)
    {
       $post->delete();

        return redirect('dashboard/posts')
            ->with('success', 'Пост был успешно успешно удален.');
    }
}
