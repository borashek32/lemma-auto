<?php

namespace App\Http\Livewire\Admin\Reviews;

use Livewire\Component;
use App\Models\Review;
use Livewire\WithPagination;

class Reviews extends Component
{
    public $body, $search, $review_id;
    public $isOpen = 0;

    use WithPagination;

    public function render()
    {
        $search = '%' . $this->search . '%';
        $reviews = Review::where('body', 'LIKE', $search)
            ->latest()
            ->paginate(12);

        return view('admin.reviews.reviews', ['reviews' => $reviews])->layout('layouts.app');
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
        $this->body      =      '';
    }

    public function store()
    {
        $this->validate([
            'body'    =>    'required',
        ]);

        Review::updateOrCreate(
            ['id'             =>    $this->review_id],
            ['body'           =>    $this->body,
            ]);

        session()->flash('message',
            $this->review_id ? 'Отзыв успешно обновлен.' : 'Пост успешно создан.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $review                 =     Review::findOrFail($id);
        $this->review_id        =     $id;
        $this->body             =     $review->body;
        $this->openModal();
    }

    public function delete($id)
    {
        Review::find($id)->delete();
        session()->flash('message', 'Отзыв успешно удален.');
    }
}
