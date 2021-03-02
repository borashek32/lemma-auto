<?php

namespace App\Http\Livewire\User\Shop;

use App\Models\Section;
use Livewire\Component;

class Sections extends Component
{
    public $sections;

    public function mount()
    {
        $this->sections = Section::all();
    }

    public function render()
    {
        return view('livewire.user.shop.sections');
    }
}
