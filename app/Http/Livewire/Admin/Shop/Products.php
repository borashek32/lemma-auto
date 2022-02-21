<?php

namespace App\Http\Livewire\Admin\Shop;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    public $name, $number, $price, $count, $product_id, $search;
    public $isOpen = 0;

    use WithPagination;

    public function render()
    {
        $search = '%' . $this->search . '%';
        $products = Product::where('name', 'LIKE', $search)
            ->orWhere('number', 'LIKE', $search)
            ->latest()
            ->paginate(10);

        return view('admin.shop.autoparts', ['products' => $products])->layout('layouts.app');
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
        $this->name            =      '';
        $this->number          =      '';
        $this->price           =      '';
        $this->count           =      '';
        $this->product_id      =      '';
    }

    protected $messages = [
        'name.required'      => 'Поле "Название" не может быть пустым',
        'number.required'    => 'Поле "Каталожный номер" не может быть пустым',
        'price.required'     => 'Поле "Цена" не может быть пустым',
        'count.required'     => 'Поле "Количесво на складе" не может быть пустым',
    ];

    public function store()
    {
        $this->validate([
            'name'           =>    'required',
            'cnumber'        =>    'required',
            'price'          =>    'required',
            'count'          =>    'required',
        ]);

        Product::updateOrCreate(
            ['id'                    =>    $this->product_id],
            ['name'                  =>    $this->title,
                'number'             =>    $this->code,
                'price'              =>    $this->price,
                'count'              =>    $this->stock_quantity,
            ]);

        session()->flash('message',
            $this->product_id ? 'Товар успешно обновлен.' : 'Товар успешно создан.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $autopart              =     Product::findOrFail($id);
        $this->product_id      =     $id;
        $this->name            =     $autopart->name;
        $this->number          =     $autopart->number  ;
        $this->price           =     $autopart->price;
        $this->count           =     $autopart->count;
        $this->openModal();
    }

    public function delete()
    {
        Product::findAll()->delete();
        session()->flash('message', 'Товары успешно удалены.');
    }
}
