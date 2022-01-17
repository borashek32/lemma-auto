<?php

namespace App\Http\Livewire\Admin\Blog;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Tags\Tag;

class Tags extends Component
{
    public $name, $search, $tag_id;
    public $isOpen = 0;

    use WithPagination;

    public function render()
    {
        $search = '%' . $this->search . '%';
        $tags = Tag::where('name', 'LIKE', $search)
            ->orWhere('slug', 'LIKE', $search)
            ->latest()
            ->paginate(10);

        return view('admin.tags.tags', ['tags' => $tags])->layout('layouts.app');
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
        $this->name = '';
        $this->tag_id = '';
    }

    protected $messages = [
        'name.required' => 'Поле "Название" не может быть пустым',
    ];

    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);

        Tag::updateOrCreate(['id' => $this->tag_id], [
            'name' => $this->name
        ]);

        session()->flash('message',
            $this->tag_id ? 'Тег успешно обновлен.' : 'Отзыв успешно создан.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        $this->tag_id = $id;
        $this->name = $tag->name;
        $this->openModal();
    }

    public function delete($id)
    {
        Tag::find($id)->delete();
        session()->flash('message', 'Комментарий успешно удален.');
    }
}
