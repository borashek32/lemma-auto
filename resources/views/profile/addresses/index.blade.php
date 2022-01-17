@extends('layouts.layoutControllers')
@section('content')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Управление контактами
            </h2>
        </div>
    </header>
<div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (session()->has('success'))
            <div class="bg-teal-100 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if(!$address)
                <div class="flex justify-betweent mb-4">
                    <div class="text-lef">
                        <a href="{{ route('addresses.create') }}">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Новый адрес
                            </button>
                        </a>
                    </div>
                </div>
                <p class="mt-6">Пока адрес не добавлен</p>
            @else
                <table class="table-fixed w-full address-table">
                    <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider" id="name">Имя</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider" id="city">Город</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider" id="postcode">Индекс</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider" id="address">Адрес</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider" id="phone">Телефон</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="trix-content">
                        <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5" id="name">{{ $address->shipping_fullname }}</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5" id="city">{{ $address->shipping_city }}</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5" id="postcode">{{ $address->shipping_postcode }}</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5" id="address">{{ $address->shipping_address }}</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5" id="phone">{{ $address->shipping_phone }}</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">
                            <button class="mb-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                <a href="{{ route('addresses.edit', $address->id) }}">
                                    Редактировать
                                </a>
                            </button>
                            <form action="{{ route('addresses.destroy', $address->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Удалить" class="bg-red-500 hover:bg-red-700
                                text-white font-bold py-2 px-4 rounded">
                            </form>
                        </td>
                    </tr>
                    </tbody>
                </table>
                
                <div class="flex flex-cols-2 items-center address-card">
                    <div class="bg-white shadow-xl rounded-lg overflow-hidden border-gray-200 m-4">
                        <div class="p-4">
                            <p class="text-lg text-gray-900">
                                Полное имя • {{ $address->shipping_fullname }}
                            </p>
                        </div>
                        <div class="p-4">
                            <p class="uppercase tracking-wide text-sm font-bold text-gray-700">
                                Адрес • {{ $address->shipping_city }}, {{ $address->shipping_postcode }}, {{ $address->shipping_address }}
                            </p>
                        </div>
                        <div class="p-4">
                            <p class="text-lg text-gray-900">
                                Телефон • {{ $address->shipping_phone }}
                            </p>
                        </div>
                        <div class="p-4">
                            <button class="mb-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                <a href="{{ route('addresses.edit', $address->id) }}">
                                    Редактировать
                                </a>
                            </button>
                            <form action="{{ route('addresses.destroy', $address->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Удалить" class="bg-red-500 hover:bg-red-700
                                text-white font-bold py-2 px-4 rounded">
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection('content')
