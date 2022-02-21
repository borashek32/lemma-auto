@extends('layouts.layoutControllers')
@section('content')
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Управление пользователями
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
            <div class="text-left">
                <a href="{{ route('users.create') }}">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Новый пользователь
                    </button>
                </a>
            </div>
            <div class="flex md:flex-row w-full">
                <div class="w-full md:w-8/10 text-center">
                    <input type="text" class="w-full shadow appearance-none border my-3 rounded py-2
                        px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1"
                           placeholder="Поиск пользоватьелей" name="search">
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
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">No.</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Имя</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Электронная почта</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Зарегистрирован</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr class="trix-context">
                        <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $user->id }}</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $user->name }}</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $user->email }}</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ date("d.m.y", strtotime($user->created_at)) }}</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">
                            <button class="mb-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                <a href="{{ route('users.edit', $user->id) }}">
                                    Редактировать
                                </a>
                            </button>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
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
            <div class="mt-4">
                {{ $users->links('vendor.pagination.simple-tailwind') }}
            </div>
        </div>
    </div>
</div>
@endsection('content')
