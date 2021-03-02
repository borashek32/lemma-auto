<?php

namespace App\Http\Livewire;

use App\Models\Autopart;
use App\Models\Section;
use Livewire\Component;
use Livewire\WithPagination;

class OneSection extends Component
{
    use WithPagination;

    public $search, $category;

    public function mount($slug)
    {
        $this->category = Section::where('slug', $slug)->first();
    }

    public function render(Section $id)
    {
        $search = '%' . $this->search . '%';
        $posts  = Autopart::where('title', 'LIKE', $search)
            ->orWhere('body', 'LIKE', $search)
            ->orWhere('category_id', '=', $id)
            ->latest()->paginate(9);
        return view('livewire.one-cat', ['posts' => $posts])->layout('layouts.blog');
    }
}
