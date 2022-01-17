<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Users extends Component
{
    public $name, $email, $search, $user_id;
    public $isOpen = 0;

    use WithPagination;

    public function render()
    {
        $search = '%' . $this->search . '%';
        $users = User::where('name', 'LIKE', $search)
            ->orWhere('email', 'LIKE', $search)
            ->latest()
            ->paginate(12);

        return view('admin.users.users', ['users' => $users])->layout('layouts.app');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->name     =      '';
        $this->email    =      '';
    }

    protected $messages = [
        'name.required' => 'Поле "Имя" не может быть пустым',
        'email.required' => 'Поле "Электронная почта" не может быть пустым',
    ];

    public function store()
    {
        $this->validate([
            'name'    =>    'required',
            'email'   =>    'required',
        ]);

        User::updateOrCreate(
            ['id'             =>    $this->user_id],
            ['name'    =>    $this->name,
             'email'   =>    $this->email,
            ]);

        session()->flash('message',
            $this->user_id ? 'Пользователь успешно обновлен.' : 'Пост успешно создан.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $user                   =     User::findOrFail($id);
        $this->name             =     $user->name;
        $this->user_id          =     $id;
        $this->email            =     $user->email;
        $this->openModal();
    }

    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('message', 'Пользователь успешно удален.');
    }
}
