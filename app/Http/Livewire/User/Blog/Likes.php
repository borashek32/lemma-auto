<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class Likes extends Component
{
    public $like;

    public function like(Post $id)
    {
        $this->like = Post::find($id)->addLikeBy(auth()->user());
    }

    public function render()
    {
        return view('includes.likes');
    }
}
