@section('title-block')Автожурнал: посты@endsection('title-block')
@extends('layouts.admin')
@section('content')
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1>Форма добавления постов</h1>
            <div>
                <div class="md:grid md:grid-cols-2 md:gap-6 py-5">
                    <div class="mt-10 md:mt-0 md:col-span-2">
                        <form action="{{ route('admin.posts.store') }}" method="POST">
                            @csrf
                            @include('includes.admin.messages_success')
                            <div class="shadow sm:rounded-md sm:overflow-hidden">
                                <div class="px-10 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-1 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                            <label for="title" class="block text-sm font-medium leading-5 text-gray-700">
                                                Название
                                            </label>
                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                <x-jet-input required id="title" type="text" name="title" class="form-input
                                                                    @error('title') is-invalid @enderror
                                                    flex-1 block w-full rounded-none rounded-md transition duration-150
                                                    ease-in-out sm:text-sm sm:leading-5" minlength="3" placeholder="Введите название">
                                                </x-jet-input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-6">
                                        <label for="text" class="block text-sm leading-5 font-medium text-gray-700">
                                            Текст
                                        </label>
                                        <div class="rounded-md shadow-sm">
                                            <textarea required id="text" name="text" rows="5" class="form-textarea
                                            @error('text') is-invalid @enderror
                                                mt-1 block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                                      placeholder="Введите текст поста" minlength="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <span class="inline-flex rounded-md shadow-sm">
                                      <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent
                                      text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500
                                      focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700
                                      transition duration-150 ease-in-out">
                                        Сохранить
                                      </button>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection('content)

