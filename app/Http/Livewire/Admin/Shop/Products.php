<?php

namespace App\Http\Livewire\Admin\Shop;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    public $title, $code, $price, $stock_quantity, $product_id, $search;
    public $isOpen = 0;

    use WithPagination;

    public function render()
    {
        $search = '%' . $this->search . '%';
        $products = Product::where('title', 'LIKE', $search)
            ->orWhere('code', 'LIKE', $search)
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
        $this->title           =      '';
        $this->code            =      '';
        $this->price           =      '';
        $this->stock_quantity  =      '';
        $this->product_id      =      '';
    }

    protected $messages = [
        'title.required'           => 'Поле "Название" не может быть пустым',
        'code.required'            => 'Поле "Каталожный номер" не может быть пустым',
        'price.required'           => 'Поле "Цена" не может быть пустым',
        'stock_quantity.required'  => 'Поле "Количесво на складе" не может быть пустым',
    ];

    public function store()
    {
        $this->validate([
            'title'          =>    'required',
            'code'         =>    'required',
            'price'          =>    'required',
            'stock_quantity'  =>    'required',
        ]);

        Product::updateOrCreate(
            ['id'                    =>    $this->product_id],
            ['title'                 =>    $this->title,
                'code'               =>    $this->code,
                'price'              =>    $this->price,
                'stock_quantity'      =>    $this->stock_quantity,
            ]);

        session()->flash('message',
            $this->product_id ? 'Товар успешно обновлен.' : 'Товар успешно создан.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $autopart                   =     Product::findOrFail($id);
        $this->product_id       =     $id;
        $this->title            =     $autopart->title;
        $this->code             =     $autopart->code  ;
        $this->price            =     $autopart->price;
        $this->stock_quantity   =     $autopart->stock_quantity;
        $this->openModal();
    }

    public function delete($id)
    {
        Product::find($id)->delete();
        session()->flash('message', 'Товар успешно удален.');
    }
}
