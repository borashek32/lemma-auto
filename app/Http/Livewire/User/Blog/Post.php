<?php

namespace App\Http\Livewire\User\Blog;

use Livewire\Component;

class Post extends Component
{
    public $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        dd($this->post);
        return view('blog.post-one')->layout('layouts.blog');
    }
}
