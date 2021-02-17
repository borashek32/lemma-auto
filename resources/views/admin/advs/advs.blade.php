<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Управление рекламой в блоге
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
            <div class="flex md:flex-row w-full">
                <div class="w-full md:w-3/10 text-left">
                    <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Новое объявление</button>
                    @if($isOpen)
                        @include('admin.advs.create')
                    @endif
                </div>
                <div class="w-full md:w-8/10 text-center">
                    <input wire:model="search" type="text" class="w-full shadow appearance-none border my-3 rounded py-2
                        px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1"
                           placeholder="Поиск объявлений" name="search">
                    @error('search')<span class="text-red-500">{{ $message }}</span>@enderror
                </div>
                <div class="w-full md:w-1/10">
                    <svg class="w-8 h-8 ml-2 mt-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
            <table class="table-fixed w-full">
                <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2 w-2">No.</th>
                    <th class="border px-4 py-2 w-20">Дата</th>
                    <th class="border px-4 py-2 w-10">Фото</th>
                    <th class="border px-4 py-2 w-20">Название</th>
                    <th class="border px-4 py-2 w-24">Ссылка</th>
                    <th class="border px-4 py-2 w-16">Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($advs as $adv)
                    <tr>
                        <td class="border px-4 py-2">{{ $adv->id }}</td>
                        <td class="border px-4 py-2">{{ Date::parse($adv->created_at)->format('j F Y') }}</td>
                        <td class="border px-4 py-2">
                            <img src="{{ url('/storage/advs/' . $adv->img) }}" class="w-20" alt="{{ $adv->title }}" />
                        </td>
                        <td class="border px-4 py-2">{{ $adv->title }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ $adv->link }}">
                                {{ Str::limit($adv->link, 40) }}
                            </a>
                        </td>
                        <td class="border px-4 py-2">
                            <button wire:click="edit({{ $adv->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Редактировать
                            </button>
                            <button wire:click="delete({{ $adv->id }})" class="mt-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Удалить
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $advs->links() }}
            </div>
        </div>
    </div>
</div>
