<?php

namespace App\Http\Livewire\Admin\Blog;

use App\Http\Requests\PostsRequest;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Post;

class Posts extends Component
{

    public $post;


    public function render()
    {
        return view('livewire.admin.posts.posts', ['posts' => Post::all()])
            ->layout('layouts.admin');
    }


    public function createPost(PostsRequest $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->text =$request->input('text');
        $this->validate();

        $this->save();

        return redirect('/admin/posts')->with('success', 'Пост создан успешно');
    }
}

