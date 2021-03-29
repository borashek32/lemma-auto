<?php

namespace App\Http\Livewire\User;

use App\Models\Contact;
use Livewire\Component;

class Contacts extends Component
{
    public $contacts;

    public function mount()
    {
        $this->contacts = Contact::all();
    }

    public function render()
    {
        return view('includes.contacts');
    }
}
