@extends('layouts.layoutControllers')
@section('content')
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Управление рекламой
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
            <div class="flex md:flex-row w-full">
                <div class="w-full md:w-3/10 text-left">
                    <a href="{{ route('advertisements.create') }}">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">
                            Новое объявление
                        </button>
                    </a>
                </div>
            </div>

            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Баннер</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Адрес сайта</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Действие</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($advertisements as $advertisement)
                        <tr>
                            <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">
                                <img src="{{ $advertisement->banner }}" width="100px" alt="{{ $advertisement->link }}" />
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">
                                {{ $advertisement->link }}
                            </td>

                            <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">
                                <div class="">
                                    <a href="{{ route('advertisements.edit', $advertisement->id) }}">
                                        <button class="mb-2 bg-blue-500 mr-2 hover:bg-blue-700 text-white font-bold py-2
                                            px-4 rounded">
                                            Редактировать
                                        </button>
                                    </a><br>

                                    <form action="{{ route('advertisements.destroy', $advertisement['id']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Удалить" class="bg-red-500 hover:bg-red-700
                                            text-white font-bold py-2 px-4 rounded">
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection('content')
