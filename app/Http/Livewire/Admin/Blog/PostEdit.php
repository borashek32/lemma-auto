<?php

namespace App\Http\Livewire\Admin\Blog;

use App\Models\Category;
use Livewire\Component;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\WithFileUploads;


class PostEdit extends Component
{
    public $categories;
    public $post;
    public $category_id;
    public $title;
    public $page_text;
    public $img;

    use WithFileUploads;

    protected $rules = [
        'post.title' => 'required',
        'post.category_id' => 'required',
        'post.page_text' => 'required',
        'post.img' => 'required',
    ];

    public function mount($id)
    {
        $this->categories = Category::all();
        $this->post = Post::where('id', $id)->first();
    }

    public function save()
    {
//        $this->validate([
//            'post.title' => 'required',
//            'post.category_id' => 'required',
//            'post.page_text' => 'required',
//            'post.img' => 'image|max:1000',
//        ]);

        $filename = $this->img->store('/', 'docs');

        auth()->user()->update([
            'post.title' => $this->title,
            'post.category_id' => $this->category_id,
            'post.page_text' => $this->page_text,
            'post.img' => $filename,
        ]);
    }

//    public function store()
//    {
//        $this->validate([
//            'category_id'    =>    'required',
//            'title'          =>    'required',
//            'page_text'           =>    'required',
//            'img'            =>    'image|max:1024'
//        ]);
//
//        Post::updateOrCreate(
//            ['category_id'            =>    $this->category_id,
//                'title'               =>    $this->title,
//                'page_text'           =>    $this->page_text,
//                'img'                 =>    $this->img,
//            ]);
//
//        if(!empty($this->img)) {
//            $this->img->store('public/docs');
//        }
//
//        session()->flash('message',
//            $this->post_id ? 'Пост успешно обновлен.' : 'Пост успешно создан.');
//    }

    public function render()
    {
        return view('admin.posts.post-edit')->layout('layouts.app');
    }
}
