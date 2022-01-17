<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Управление контактами
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
                    <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">
                        Новый офис
                    </button>
                    @if($isOpen)
                        @include('admin.contacts.create')
                    @endif
                </div>
                <div class="w-full md:w-8/10 text-center">
                    <input wire:model="search" type="text" class="w-full shadow appearance-none border my-3 rounded py-2
                        px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1"
                           placeholder="Поиск офисов" name="search">
                    @error('search')<span class="text-red-500">{{ $message }}</span>@enderror
                </div>
                <div class="w-full md:w-1/10">
                    <svg class="w-8 h-8 ml-2 mt-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
            @if(\App\Models\Contact::all()->count() > 0)
                <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Адрес</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Время работы</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Телефон</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Карта проезда</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Действия</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $contact->address }}</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $contact->time }}</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $contact->phone }}</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">
                            <iframe src="{{ $contact->map }}"
                                    width="100" height="100" frameborder="0" style="border:0;" allowfullscreen=""
                                    aria-hidden="false"
                                    tabindex="0">
                            </iframe>
                        </td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">
                            <button wire:click="edit({{ $contact->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Редактировать
                            </button>
                            <button wire:click="delete({{ $contact->id }})" class="mt-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Удалить
                            </button><br>
                            <a href="#">
                                <button class="mt-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Посмотреть
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
                <p>Адреса офисов пока не добавлены</p>
            @endif
            <div class="mt-4">
                {{ $contacts->links() }}
            </div>
        </div>
    </div>
</div>
