<?php

namespace App\Http\Livewire\Admin\Shop;

use App\Models\Autopart;
use Livewire\Component;
use Livewire\WithPagination;

class Autoparts extends Component
{
    public $title, $number, $price, $delivery_time, $autopart_id, $search;
    public $isOpen = 0;

    use WithPagination;

    public function render()
    {
        $search = '%' . $this->search . '%';
        $autoparts = Autopart::where('title', 'LIKE', $search)
            ->orWhere('number', 'LIKE', $search)
            ->latest()
            ->paginate(12);

        return view('admin.shop.autoparts', ['autoparts' => $autoparts])->layout('layouts.app');
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
        $this->title           =      '';
        $this->number          =      '';
        $this->price           =      '';
        $this->delivery_time   =      '';
        $this->autopart_id     =      '';
    }

    public function store()
    {
        $this->validate([
            'title'          =>    'required',
            'number'         =>    'required',
            'price'          =>    'required',
            'delivery_time'  =>    'required',
        ]);

        Autopart::updateOrCreate(
            ['id'                    =>    $this->autopart_id],
            ['title'                 =>    $this->title,
                'number'             =>    $this->number,
                'price'              =>    $this->price,
                'delivery_time'      =>    $this->delivery_time,
            ]);

        session()->flash('message',
            $this->autopart_id ? 'Товар успешно обновлен.' : 'Товар успешно создан.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $autopart                   =     Autopart::findOrFail($id);
        $this->autopart_id      =     $id;
        $this->title            =     $autopart->title;
        $this->number           =     $autopart->number;
        $this->price            =     $autopart->price;
        $this->delivery_time    =     $autopart->delivery_time;
        $this->openModal();
    }

    public function delete($id)
    {
        Autopart::find($id)->delete();
        session()->flash('message', 'Товар успешно удален.');
    }
}
