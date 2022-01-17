<?php

namespace App\Http\Livewire\User\Blog;

use Spatie\Tags\Tag;
use Livewire\Component;

class Tags extends Component
{
    public $tags;

    public function mount()
    {
        $this->tags = Tag::all();
    }

    public function render()
    {
        return view('includes.blog.tags-cloud');
    }
}
