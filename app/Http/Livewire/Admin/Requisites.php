<?php

namespace App\Http\Livewire\Admin;

use App\Models\Requisite;
use Livewire\Component;

class Requisites extends Component
{
    public $title, $legal_address, $real_address, $inn_kpp, $r_s, $k_s, $bik, $requisite_id;
    public $isOpen = 0;

    public function render()
    {
        $requisites = Requisite::all();

        return view('admin.requisites.requisites', compact('requisites'));
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
        $this->requisite_id  = '';
        $this->title         = '';
        $this->legal_address = '';
        $this->real_address  = '';
        $this->inn_kpp       = '';
        $this->r_s           = '';
        $this->k_s           = '';
        $this->bik           = '';
    }

    protected $messages = [
        'title.required'      => 'Поле "Текст" не может быть пустым',
        'title.legal_address' => 'Поле "Юридический адрес" не может быть пустым',
        'title.real_address'  => 'Поле "Фактический адрес" не может быть пустым',
        'title.inn_kpp'       => 'Поле "ИНН/КПП" не может быть пустым',
        'title.r_s'           => 'Поле "Расчетный счет" не может быть пустым',
        'title.k_s'           => 'Поле "Корреспонденский счет" не может быть пустым',
        'title.bik'           => 'Поле "БИК" не может быть пустым',
    ];

    public function store()
    {
        $this->validate([
            'title'         => 'required',
            'legal_address' => 'required',
            'real_address'  => 'required',
            'inn_kpp'       => 'required',
            'r_s'           => 'required',
            'k_s'           => 'required',
            'bik'           => 'required'
        ]);

        Requisite::updateOrCreate(['id' => $this->requisite_id], [
            'title'         => $this->title,
            'legal_address' => $this->legal_address,
            'real_address'  => $this->real_address,
            'inn_kpp'       => $this->inn_kpp,
            'r_s'           => $this->r_s,
            'k_s'           => $this->k_s,
            'bik'           => $this->bik,
        ]);

        session()->flash('message',
            $this->requisite_id ? 'Руквизиты успешно обновлены.' : 'Руквизиты успешно созданы.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $requisite = Requisite::findOrFail($id);
        $this->requisite_id     = $id;
        $this->title            = $requisite->title;
        $this->legal_address    = $requisite->legal_address;
        $this->real_address     = $requisite->real_address;
        $this->inn_kpp          = $requisite->inn_kpp;
        $this->r_s              = $requisite->r_s;
        $this->k_s              = $requisite->k_s;
        $this->bik              = $requisite->bik;
        $this->openModal();
    }

    public function delete($id)
    {
        Requisite::find($id)->delete();
        session()->flash('message', 'Реквизиты успешно удалены.');
    }
}
