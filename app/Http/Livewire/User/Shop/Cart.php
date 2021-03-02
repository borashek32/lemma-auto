<?php

namespace App\Http\Livewire\User\Shop;

use App\Models\Autopart;
use Livewire\Component;

class Cart extends Component
{
    public $autopart;

    public function mount($slug)
    {
        $this->autopart = Autopart::where('slug', $slug)->first();
    }

    public function render()
    {
        return view('profile.cart')->layout('layouts.app');
    }
}
