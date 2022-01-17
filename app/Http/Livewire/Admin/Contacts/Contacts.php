<?php

namespace App\Http\Livewire\Admin\Contacts;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class Contacts extends Component
{
    public $address, $phone, $map, $time, $desc, $search, $contact_id;
    public $isOpen = 0;

    use WithPagination;

    public function render()
    {
        $search = '%' . $this->search . '%';
        $contacts = Contact::where('address', 'LIKE', $search)
            ->orWhere('phone', 'LIKE', $search)
            ->orWhere('desc', 'LIKE', $search)
            ->latest()
            ->paginate(4);

        return view('admin.contacts.contacts', ['contacts' => $contacts])->layout('layouts.app');
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
        $this->address              =      '';
        $this->map                  =      '';
        $this->phone                =      '';
        $this->contact_id           =      '';
        $this->time                 =      '';
        $this->desc                 =      '';
    }

    protected $messages = [
        'address.required' => 'Поле "Карта проезда" не может быть пустым',
        'phone.required' => 'Поле "Телефон" не может быть пустым',
        'map.required' => 'Поле "Адрес" не может быть пустым',
        'time.required' => 'Поле "Время работы" не может быть пустым',
        'desc.required' => 'Поле "Описание" не может быть пустым',
    ];

    public function store()
    {
        $this->validate([
            'address'          =>    'required',
            'phone'            =>    'required',
            'map'              =>    'required',
            'time'             =>    'required',
            'desc'             =>    'required',
        ]);

        Contact::updateOrCreate(
            ['id'               =>    $this->contact_id],
            ['address'          =>    $this->address,
                'map'           =>    $this->map,
                'phone'         =>    $this->phone,
                'time'          =>    $this->time,
                'desc'          =>    $this->desc,
            ]);

        session()->flash('message',
            $this->contact_id ? 'Офис успешно обновлен.' : 'Офис успешно создан.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $contact                   =     Contact::findOrFail($id);
        $this->contact_id          =     $id;
        $this->address             =     $contact->address;
        $this->map                 =     $contact->map;
        $this->phone               =     $contact->phone;
        $this->time                =     $contact->time;
        $this->desc                =     $contact->desc;
        $this->openModal();
    }

    public function delete($id)
    {
        Contact::find($id)->delete();
        session()->flash('message', 'Пост успешно удален.');
    }
}
