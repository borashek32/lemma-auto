@extends('layouts.layoutControllers')
@section('content')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Редактировать информацию о сотруднике
            </h2>
        </div>
    </header>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <form action="{{ route('members.update', $member->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-4">
                        <label for="photo" class="block text-gray-700 text-sm font-bold mb-2">
                            Фото
                        </label>
                        <img src="@if($member->photo) {{ $member->photo }} @endif" alt="" width="200" class="img-uploaded mb-2">
                        <div class="grid gap-x-8 gap-y-4 grid-cols-2">
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                                leading-tight focus:outline-none focus:shadow-outline mb-4" id="feature_image"
                                   name="photo" value="{{ $member->photo }}" readonly>
                            <a href="" class="popup_selector shadow appearance-none border rounded w-40 h-10 text-center py-2 px-3 text-gray-700
                                leading-tight focus:outline-none focus:shadow-outline" data-inputid="feature_image">
                                Выбрать фото
                            </a>
                        </div>
                        @error('photo') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">
                            ФИО:
                        </label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                        leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput2"
                               value="{{ $member->name }}" name="name" required>
                        @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">
                            Телефон:
                        </label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                        leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput2"
                               value="{{ $member->phone }}" name="phone" required>
                        @error('phone') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput2" class="block text-gray-700 text-sm font-bold mb-2">
                            Должность:
                        </label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                        leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput2"
                               name="position" value="{{ $member->position }}" required>
                        @error('position') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="editor" class="block text-gray-700 text-sm font-bold mb-2">
                            Описание:
                        </label>
                        <textarea rows="6" name="description" class="editor shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                            leading-tight focus:outline-none focus:shadow-outline">{!! $member->description !!}}</textarea>
                        @error('description') <span class="text-red-500">{{ $message }}</span>@enderror
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
