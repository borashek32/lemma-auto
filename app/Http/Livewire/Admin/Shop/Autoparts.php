<?php

namespace App\Http\Livewire\Admin\Shop;

use App\Models\Autopart;
use App\Models\Section;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\Component;
use Livewire\WithPagination;

class Autoparts extends Component
{
    public $title, $number, $sections, $section_id, $autopart_id, $search;
    public $isOpen = 0;

    use WithPagination;

    public function mount()
    {
        $this->sections = Section::all();
    }

    public function updatedTitle()
    {
        $this->slug = SlugService::createSlug(Autopart::class, 'slug', $this->title);
    }

    public function render()
    {
        $search = '%' . $this->search . '%';
        $autoparts = Autopart::where('title', 'LIKE', $search)
            ->orWhere('number', 'LIKE', $search)
            ->latest()
            ->paginate(12);

        return view('admin.shop.autoparts.autoparts', ['autoparts' => $autoparts])->layout('layouts.app');
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
        $this->section_id      =      '';
        $this->title           =      '';
        $this->number          =      '';
        $this->autopart_id     =      '';
    }

    public function store()
    {
        $this->validate([
            'section_id'     =>    'required',
            'title'          =>    'required',
            'number'         =>    'required',
        ]);

        Autopart::updateOrCreate(
            ['id'             =>    $this->autopart_id],
            ['section_id'     =>    $this->section_id,
                'title'       =>    $this->title,
                'number'      =>    $this->number,
            ]);

        session()->flash('message',
            $this->autopart_id ? 'Товар успешно обновлен.' : 'Товар успешно создан.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $autopart                   =     Autopart::findOrFail($id);
        $this->section_id       =     $autopart->section_id ;
        $this->autopart_id      =     $id;
        $this->title            =     $autopart->title;
        $this->number           =     $autopart->number;
        $this->openModal();
    }

    public function delete($id)
    {
        Autopart::find($id)->delete();
        session()->flash('message', 'Товар успешно удален.');
    }
}
