<?php

namespace App\Http\Livewire\Admin\Blog;

use Livewire\Component;
use Livewire\WithFileUploads;

class ImgUploader extends Component
{
    use WithFileUploads;

    public $img;
    public $post;

    protected $rules = [
        'img' => 'image|max:1024'
    ];

    public function updatedPhoto()
    {
        $this->resetErrorBag();
    }

    public function storePhoto()
    {
        $this->validate();

        $this->post->update([
            'img' => $this->img->store('docs', 'public')
        ]);
    }

    public function render()
    {
        return view('admin.posts.img-uploader');
    }
}
