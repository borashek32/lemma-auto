<?php

namespace App\Http\Livewire\Admin\Blog;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\WithPagination;
use Livewire\WithFileUploads;


class Posts extends Component
{
    public $title, $categories, $category, $category_id, $page_text, $post_id, $search, $img;
    public $files = [];
    public $isOpen = 0;
    public $isUpdate = 0;

    use WithFileUploads;
    use WithPagination;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function updatedTitle($value)
    {
        $this->slug = SlugService::createSlug(Post::class, 'slug', $value);
    }

    public function render()
    {
        $search = '%' . $this->search . '%';
        $posts = Post::where('title', 'LIKE', $search)
            ->orWhere('page_text', 'LIKE', $search)
            ->latest()
            ->paginate(12);

        return view('admin.posts.posts', ['posts' => $posts])->layout('layouts.app');
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
        $this->category_id      =     '';
        $this->img              =     '';
        $this->title            =     '';
        $this->page_text        =     '';
        $this->post_id          =     '';
    }

    public function store()
    {
        $this->validate([
            'category_id'      =>     'required',
            'title'            =>     'required',
            'page_text'        =>     'required',
            'img'              =>     'required'
        ]);

        $this->img->store('/', $this->img);

        Post::updateOrCreate(
            ['id'              =>     $this->post_id],
            ['category_id'     =>     $this->category_id,
                'title'        =>     $this->title,
                'page_text'    =>     $this->page_text,
                'img'          =>     $this->img,
            ]);

        session()->flash('message',
            $this->post_id ? 'Пост успешно обновлен.' : 'Пост успешно создан.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $post                    =       Post::findOrFail($id);
        $this->category_id       =       $post->category_id;
        $this->post_id           =       $id;
        $this->title             =       $post->title;
        $this->page_text         =       $post->page_text;
        $this->img               =       $post->img;
        $this->openModal();
    }

    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Пост успешно удален.');
    }
}
//Storage::disk('public')->get('public/docs/' .
