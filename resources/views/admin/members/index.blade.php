@extends('admin.members.layout')
@section('content')
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Управление командой
        </h2>
    </div>
</header>
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
                    <a href="{{ route('members.create') }}">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">
                            Новый сотрудник
                        </button>
                    </a>
                </div>
            </div>
            <table class="table-fixed w-full">
                <thead>
                <tr class="bg-gray-100">
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-2">No.</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider">Имя</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider">Должность</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider">Телефон</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider">Описание</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider">Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($members as $member)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">{{ $member->id }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">{{ $member->name }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">{{ $member->position }}</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $member->phone }}</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">
                            {{ Str::limit($member->description, 50) }}
                        </td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">
                            <a href="{{ route('members.edit', $member['id']) }}">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Редактировать
                                </button>
                            </a>
                            <form action="{{ route('members.destroy', $member['id']) }}" method="DELETE">
                                @csrf
                                <input type="button" value="Удалить" class="inline-flex justify-center
                                      rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-medium
                                      text-white shadow-sm hover:bg-red-500 focus:outline-none focus:border-red-700
                                      focus:shadow-outline-red w-20 transition m-2 ease-in-out duration-150 sm:text-sm sm:leading-5">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection('content')
