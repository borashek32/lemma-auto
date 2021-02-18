<?php

namespace App\Http\Livewire;

use App\Models\Section;
use Livewire\Component;

class Sects extends Component
{
    public $sections;

    public function mount()
    {
        $this->sections = Section::all();
    }

    public function render()
    {
        return view('livewire.sections');
    }
}
