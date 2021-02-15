<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Post;
use Livewire\WithPagination;

class OneCat extends Component
{
    use WithPagination;

    public $search, $category;

    public function mount($slug)
    {
        $this->category = Category::where('slug', $slug)->first();
    }

    public function render(Category $id)
    {
        $search = '%' . $this->search . '%';
        $posts  = Post::where('title', 'LIKE', $search)
            ->orWhere('body', 'LIKE', $search)
            ->orWhere('category_id', '=', $id)
            ->latest()->paginate(9);
        return view('livewire.one-cat', ['posts' => $posts])->layout('layouts.blog');
    }
}
