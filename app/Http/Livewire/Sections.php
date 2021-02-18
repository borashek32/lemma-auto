<?php

namespace App\Http\Livewire;

use App\Models\Section;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\Component;
use Livewire\WithPagination;

class Sections extends Component
{
    public $name, $search, $section_id;
    public $isOpen = 0;

    use WithPagination;

    public function render()
    {
        $search = '%' . $this->search . '%';
        $sections = Section::where('name', 'LIKE', $search)
            ->latest()
            ->paginate(12);

        return view('admin.shop.sections.sections', compact('sections'));
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

    private function resetInputFields(){
        $this->name   =  '';
//        $this->slug = '';
    }

    public function store()
    {
        $this->validate([
            'name'   => 'required|max:40',
//            'slug'   => 'required|max:30'
        ]);

        Section::updateOrCreate(['id' => $this->section_id], [
            'name'    => $this->name,
//            'slug'    => $this->slug,
        ]);

        session()->flash('message',
            $this->section_id ? 'Категория успешно обновлена.' : 'Категория успешно создана.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $section             =    Section::findOrFail($id);
        $this->section_id    =    $id;
        $this->name          =    $section->name;
        $this->openModal();
    }

    public function updatedTitle()
    {
        $this->slug = SlugService::createSlug(Section::class, 'slug', $this->name);
    }

    public function delete($id)
    {
        Section::find($id)->delete();
        session()->flash('message', 'Категория успешно удалена.');
    }
}
