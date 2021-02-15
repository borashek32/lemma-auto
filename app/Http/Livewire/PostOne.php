<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostOne extends Component
{
    public $post;

    public function mount($slug)
    {
        $this->post = Post::where('slug', $slug)->first();
    }

    public function render()
    {
        return view('livewire.post-one')->layout('layouts.blog');
    }
}
