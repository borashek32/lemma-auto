<?php

namespace App\Http\Livewire\User\Blog;

use Livewire\Component;
use App\Models\Category;

class Cats extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('includes.blog.cats');
    }
}
