<?php

namespace App\Http\Livewire\Admin\Advertisements;

use Livewire\Component;
use App\Models\Adv;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Advs extends Component
{
    public $title, $link, $img, $adv_id, $search;
    public $isOpen = 0;

    use WithFileUploads;
    use WithPagination;

    public function render()
    {
        $search = '%' . $this->search . '%';
        $advs = Adv::where('title', 'LIKE', $search)
            ->latest()
            ->paginate(12);

        return view('admin.advs.advs', ['advs' => $advs])->layout('layouts.app');
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
        $this->title            =      '';
        $this->link             =      '';
        $this->img              =      '';
        $this->adv_id           =      '';
    }

    public function store()
    {
        $this->validate([
            'title'          =>    'required',
            'link'           =>    'required',
            'img'            =>    'image|max:1024'
        ]);

        Adv::updateOrCreate(
            ['id'             =>    $this->adv_id],
            ['title'          =>    $this->title,
             'link'           =>    $this->link,
             'img'            =>    $this->img->hashName(),
            ]);

        if(!empty($this->img)) {
            $this->img->store('public/advs');
        }

        session()->flash('message',
            $this->adv_id ? 'Объявление успешно обновлено.' : 'Объявление успешно создано.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $adv                    =     Adv::findOrFail($id);
        $this->adv_id           =     $id;
        $this->title            =     $adv->title;
        $this->link             =     $adv->link;
        $this->img              =     $adv->img;
        $this->openModal();
    }

    public function delete($id)
    {
        Adv::find($id)->delete();
        session()->flash('message', 'Объявление успешно удалено.');
    }
}
