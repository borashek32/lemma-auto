<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Управление автозвпчастями
    </h2>
</x-slot>
<div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (session()->has('message'))
            <div class="bg-teal-100 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
        @endif
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <div class="grid grid-cols-3 text-left">
                <div class="grid-cols-1">
                    <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Новая автозапчасть</button>
                    @if($isOpen)
                        @include('admin.shop.create')
                    @endif
                </div>

                <div class="grid grid-cols-1">
                    <div class="grid grid-cols-2">
                        <div class="grid-cols-1">
                            <input wire:model="search" type="text" class="w-full shadow appearance-none border my-3 rounded py-2
                                   px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1"
                                   placeholder="Поиск автозапчастей" name="search">
                            @error('search')<span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="grid-cols-1">
                            <svg class="w-8 h-8 ml-2 mt-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1">
                    @include('includes.admin.prices')
                </div>
            </div>
            @if(\App\Models\Product::all()->count() > 0)
                <table class="table-fixed w-full">
                <thead>
                <tr class="bg-gray-100">
                    <th class="px-6 py-3 text-center border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Дата<br>добавления в бд</th>
                    <th class="px-6 py-3 text-center border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Каталожный<br>номер</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Название</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Цена</th>
                    <th class="px-6 py-3 text-center border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Количество<br>на складе</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ Date::parse($product->created_at)->format('j F Y') }}</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $product->code}}</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $product->title }}</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $product->price }} руб.</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $product->stock_quantity }} шт.</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">
                            <button wire:click="edit({{ $product->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Редактировать
                            </button>
                            <button wire:click="delete({{ $product->id }})" class="mt-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Удалить
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
                <p>На сайте пока нет товаров.</p>
            @endif
            <div class="mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
