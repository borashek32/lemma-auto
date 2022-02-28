<?php

namespace App\Http\Livewire\Admin\Payment;

use Livewire\Component;
use App\Models\Payment;
use Livewire\WithPagination;

class Payments extends Component
{
    public $payment_method, $description, $payment_id, $search;
    public $isOpen = 0;

    use WithPagination;

    public function render()
    {
        $search = '%' . $this->search . '%';
        $payments = Payment::where('payment_method', 'LIKE', $search)
            ->orWhere('description', 'LIKE', $search)
            ->latest()
            ->paginate(4);

        return view('admin.payments.payments', ['payments' => $payments])->layout('layouts.app');
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
        $this->payment_method = '';
        $this->description    = '';
    }

    protected $messages = [
        'payment_method.required' => 'Поле "Вариант оплаты" не может быть пустым',
        'description.required'    => 'Поле "Описание" не может быть пустым'
    ];

    public function store()
    {
        $this->validate([
            'payment_method'          =>    'required',
            'description'             =>    'required'
        ]);

        Payment::updateOrCreate(
            ['id'                      =>    $this->payment_id],
            ['payment_method'          =>    $this->payment_method,
            'description'              =>    $this->description,]
        );

        session()->flash('message',
            $this->payment_id ? 'Метод оплаты успешно обновлен.' : 'Метод оплаты успешно создан.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $payment                   =     Payment::findOrFail($id);
        $this->payment_id          =     $id;
        $this->payment_method      =     $payment->payment_method;
        $this->description         =     $payment->description;
        $this->openModal();
    }

    public function delete($id)
    {
        Payment::find($id)->delete();
        session()->flash('message', 'Метод оплаты успешно удален.');
    }
}
