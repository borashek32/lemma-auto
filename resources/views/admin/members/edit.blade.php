@extends('admin.members.layout')
@section('content')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Добавление нового сотрудника
            </h2>
        </div>
    </header>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <form action="{{ route('members.update', $member->id) }}" method="PUT">
                    @csrf
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">
                            Имя:
                        </label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                        leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput2"
                               value="{{ $member->name }}" name="name" required>{{ $member->name }}
                        @error('title') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">
                            Телефон:
                        </label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                        leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput2"
                               value="{{ $member->phone }}" name="phone" required>
                        @error('title') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput2" class="block text-gray-700 text-sm font-bold mb-2">
                            Должность:
                        </label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                        leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput2"
                               name="position" value="{{ $member->position }}" required>
                        @error('link') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput2" class="block text-gray-700 text-sm font-bold mb-2">
                            Описание:
                        </label>
                        <textarea rows="10" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                        leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput3"
                                  name="description" required>{{ $member->description }}</textarea>
                        @error('link') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                              <input type="submit" value="Обновить" class="inline-flex justify-center w-full
                              rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium
                              text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700
                              focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        </span>
                        <a href="{{ route('members.index') }}">
                            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                  <button type="submit" class="inline-flex justify-center w-full
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
@endsection('content')
