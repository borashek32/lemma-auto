@extends('layouts.layoutControllers')
@section('content')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Управление доставкой
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
                        <a href="{{ route('deliveries.create') }}">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Новый вариант доставки
                            </button>
                        </a>
                    </div>
                    <div class="text-center">
                        @include('includes.admin.search-posts')
                    </div>
                </div>
                @if(\App\Models\Delivery::all()->count() > 0)
                    <table class="table-fixed w-full">
                    <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">No.</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Название</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Описание</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Дата написания</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($deliveries as $delivery)
                        <tr>
                            <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $delivery->id }}</td>
                            <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $delivery->title }}</td>
                            <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ substr($delivery->description, 0, 100) }}...</td>
                            <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ Date::parse($delivery->created_at)->format('j F Y') }}</td>
                            <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">
                                <button class="mb-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    <a href="{{ route('deliveries.edit', $delivery->id) }}">
                                        Редактировать
                                    </a>
                                </button>
                                <form action="{{ route('deliveries.destroy', $delivery->id) }}" method="POST">
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
                    <p>На сайте пока нет вариантов доставки.</p>
                @endif
               <div class="mt-4">
                   {{ $deliveries->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection('content')

