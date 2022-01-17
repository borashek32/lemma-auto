<?php

namespace App\Http\Livewire\Admin\Reviews;

use Livewire\Component;
use App\Models\Review;
use Livewire\WithPagination;

class Reviews extends Component
{
    public $review_id, $body, $search;
    public $isOpen = 0;

    use WithPagination;

    public function render()
    {
        $reviews  = Review::all();
        return view('admin.reviews.reviews', ['reviews' => $reviews])->layout('layouts.app');
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
        $this->body = '';
        $this->review_id = '';
    }

    protected $messages = [
        'body.required' => 'Поле "Текст" не может быть пустым',
    ];

    public function store()
    {
        $this->validate([
            'body' => 'required',
        ]);

        Review::updateOrCreate(['id' => $this->review_id], [
            'body' => $this->body
        ]);

        session()->flash('message',
            $this->review_id ? 'Комментарий успешно обновлен.' : 'Отзыв успешно создан.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);
        $this->review_id = $id;
        $this->body = $review->body;
        $this->openModal();
    }

    public function delete($id)
    {
        Review::find($id)->delete();
        session()->flash('message', 'Комментарий успешно удален.');
    }
}
