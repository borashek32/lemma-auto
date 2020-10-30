<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function index()
    {
        return view('admin.posts.index', ['posts' => Post::all()]);
    }


    public function create()
    {
        return view('admin.posts.create');
    }


    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->text  = $request->input('text');
        $post->save();

        return redirect('admin/posts')->with('success', 'Пост создан успешно');
    }


    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }


    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }


    //эти не работают


    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->text  = $request->input('text');
        $post->save();

        return redirect('admin/posts')->with('success', 'Пост успешно обновлен');
    }


    public function destroy(Post $post)
    {

//        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('admin/posts')->with('success', 'Пост удален успешно');
    }
}
