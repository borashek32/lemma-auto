<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    public function store(Request $request)
    {
        Post::create($request->all());

        return redirect('/dashboard/posts')
            ->with('success', 'Информация о новом сотруднике была успешно добавлена!');
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

    public function update(Request $request, Post $post)
    {
        $post->category_id = $request->category_id;
        $post->img =  $request->img;
        $post->title =  $request->title;
        $post->page_text = $request->page_text;
        $post->save();

        return redirect('dashboard/posts')
            ->with('success', 'Информация о новом сотруднике была успешно добавлена!');
    }

    public function destroy(Post $post)
    {
       $post->delete();

        return redirect('dashboard/posts')->with('success', 'Информация о сотруднике была успешно удалена!');
    }
}
