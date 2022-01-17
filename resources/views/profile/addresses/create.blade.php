@extends('layouts.layoutControllers')
@section('content')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Добавление нового контакта
            </h2>
        </div>
    </header>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <form action="{{ route('addresses.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                    <div class="mb-4">
                        <label for="shipping_fullname" class="block text-gray-700 text-sm font-bold mb-2">
                            Имя:
                        </label>

                        <input type="text" value="{{ old('shipping_fullname') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                            leading-tight focus:outline-none focus:shadow-outline @error('shipping_fullname') border-red-500
                            @enderror" id="shipping_fullname" name="shipping_fullname" required placeholder="Введите полное имя">

                        @error('shipping_fullname')
                            <div class="mt-2 text-red-500 mb-2 text-small">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="shipping_city" class="block text-gray-700 text-sm font-bold mb-2">
                            Город:
                        </label>

                        <input type="text" value="{{ old('shipping_city') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                            leading-tight focus:outline-none focus:shadow-outline @error('shipping_city') border-red-500
                            @enderror" id="shipping_city" name="shipping_city" required placeholder="Введите город">

                        @error('shipping_city')
                        <div class="mt-2 text-red-500 mb-2 text-small">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="shipping_postcode" class="block text-gray-700 text-sm font-bold mb-2">
                            Индекс:
                        </label>

                        <input type="text" value="{{ old('shipping_postcode') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                            leading-tight focus:outline-none focus:shadow-outline @error('shipping_postcode') border-red-500
                            @enderror" id="shipping_postcode" name="shipping_postcode" required placeholder="Введите индекс">

                        @error('shipping_postcode')
                        <div class="mt-2 text-red-500 mb-2 text-small">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="shipping_address" class="block text-gray-700 text-sm font-bold mb-2">
                            Адрес:
                        </label>

                        <input type="text" value="{{ old('shipping_address') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                            leading-tight focus:outline-none focus:shadow-outline @error('shipping_address') border-red-500
                            @enderror" id="shipping_address" name="shipping_address" required placeholder="Введите адрес">

                        @error('shipping_address')
                        <div class="mt-2 text-red-500 mb-2 text-small">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="shipping_phone" class="block text-gray-700 text-sm font-bold mb-2">
                            Адрес:
                        </label>

                        <input type="text" value="{{ old('shipping_phone') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                            leading-tight focus:outline-none focus:shadow-outline @error('shipping_phone') border-red-500
                            @enderror" id="shipping_phone" name="shipping_phone" required placeholder="Введите телефон">

                        @error('shipping_phone')
                        <div class="mt-2 text-red-500 mb-2 text-small">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <input type="submit" value="Сохранить" class="inline-flex justify-center w-full
                            rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium
                            text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700
                            focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        </span>

                        <a href="{{ route('addresses.index') }}">
                            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                <button type="button" class="inline-flex justify-center w-full
                                rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium
                                text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300
                                focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                    Выход
                                </button>
                            </span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    if(isset($modal)) {
        echo('$(window).load(function(){$("#' . $modal . '").modal(\'show\');});');
    }
    ?>
@endsection('content')
