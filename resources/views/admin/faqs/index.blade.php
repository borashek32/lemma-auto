@extends('layouts.layoutControllers')
@section('content')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Управление частыми вопросами
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
            <div class="flex justify-between">
                <div class="text-left">
                    <a href="{{ route('faqs.create') }}">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Новый вопрос
                        </button>
                    </a>
                </div>
                <div class="text-center">
                    
                    
                    <form method="get" action="{{ route('faqs.index') }}" class="input-group mb-3">
                        <div class="flex">
                            <input type="text" class="shadow appearance-none border rounded w-100 py-2 px-3 text-gray-700
                                leading-tight focus:outline-none focus:shadow-outline mr-4 "
                                placeholder="Поиск" aria-label="Username" id="search" name="search"
                                aria-describedby="basic-addon1">
                    
                            <button type="submit" class="shadow appearance-none border ml-2 rounded w-20 h-9 text-center py-2 px-3 text-gray-700
                                leading-tight focus:outline-none focus:shadow-outline bg-blue-200">
                                Поиск
                            </button>
                    
                            <a href="{{ route('faqs.index') }}">
                                <button type="submit" class="ml-4 shadow appearance-none border rounded w-20 h-9 text-center py-2 px-3 text-gray-700
                                leading-tight focus:outline-none focus:shadow-outline bg-red-200">
                                    Сброс
                                </button>
                            </a>
                        </div>
                        @error('search')<span class="text-red-500">{{ $message }}</span>@enderror
                    </form>


                </div>
            </div>
            @if(\App\Models\Faq::all()->count() > 0)
                <table class="table-fixed w-full">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Дата</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Вопрос</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Действие</th>
                        </tr>
                    </thead>
                <tbody>
                @foreach($faqs as $faq)
                    <tr class="trix-content">
                        <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ Date::parse($faq->created_at)->format('j F Y') }}</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $faq->question }}</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">
                            <button class="mb-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                <a href="{{ route('faqs.edit', $faq->id) }}">
                                    Редактировать
                                </a>
                            </button>
                            <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Удалить" class="bg-red-500 hover:bg-red-700
                                    text-white font-bold py-2 px-4 rounded">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
                <p>На сайте пока нет частзадаваемых вопросов</p>
            @endif
            <div class="mt-4">
                {{ $faqs->links('vendor.pagination.simple-tailwind') }}
            </div>
        </div>
    </div>
</div>
@endsection('content')
