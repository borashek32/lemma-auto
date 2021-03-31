<?php

namespace App\Http\Livewire\User\Advertisements;

use Livewire\Component;
use App\Models\Advertisement;

class Advertisements extends Component
{
    public $advertisements;

    public function mount()
    {
        $this->advertisements = Advertisement::all();
    }

    public function render()
    {
        return view('includes.advertisements');
    }
}
