<?php

namespace App\Http\Livewire\Admin\Blog;

use Livewire\Component;
use App\Models\Comment;
use Livewire\WithPagination;

class Comments extends Component
{
    public $comment, $user_id, $commentable_id;
    public $isOpen = 0;

    use WithPagination;

    public function render()
    {
        $comments  = Comment::all();
        return view('admin.comments.comments', ['comments' => $comments])->layout('layouts.app');
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
        $this->comment = '';
        $this->commentable_id = '';
    }

    protected $messages = [
        'body.required' => 'Поле "Комментарий" не может быть пустым',
    ];

    public function store()
    {
        $this->validate([
            'comment' => 'required',
        ]);

        Comment::updateOrCreate(['id' => $this->commentable_id], [
            'comment' => $this->comment
        ]);

        session()->flash('message',
            $this->commentable_id ? 'Комментарий успешно обновлен.' : 'Отзыв успешно создан.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        $this->commentable_id = $id;
        $this->comment = $comment->comment;
        $this->openModal();
    }

    public function delete($id)
    {
        Comment::find($id)->delete();
        session()->flash('message', 'Комментарий успешно удален.');
    }
}
