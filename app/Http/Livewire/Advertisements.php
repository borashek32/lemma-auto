<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Adv;

class Advertisements extends Component
{
    public $advs;

    public function mount()
    {
        $this->advs = Adv::all();
    }

    public function render()
    {
        return view('livewire.advertisements');
    }
}
