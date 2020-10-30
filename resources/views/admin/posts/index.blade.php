@section('title-block')Автожурнал: посты@endsection('title-block')
@extends('layouts.admin')
@section('content')
<div class="py-1">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <table class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <thead>
            @csrf
            @include('includes.admin.messages_success')
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>
                        {{ $post->created_at }}
                    </td>
                    <td class="px-6 py-1 whitespace-no-wrap">
                        <div class="flex items-center">
                            <div class="md:grid md:grid-cols-2 md:gap-6 py-5">
                                <div class="mt-10 md:mt-0 md:col-span-2">
                                    <form action="{{ route('admin.posts') }}" method="GET">
                                        @csrf
                                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                                            <div class="px-10 py-5 bg-white sm:p-6">
                                                <div class="md:grid md:grid-cols-4 md:gap-6">
                                                    <div class="mt-5 md:mt-0 md:col-span-2">
                                                        <h6>{{ $post->title }}</h6>
                                                        <p>{{ $post->text }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="inline-flex rounded-md shadow-sm">
                            <form action="{{ route('admin.posts.show', $post->id) }}">
                                  <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent
                                      text-sm leading-5 font-medium rounded-md text-white bg-indigo-500 hover:bg-indigo-400
                                      focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-600
                                      transition duration-150 ease-in-out">
                                        Посмотреть
                                  </button>
                            </form>
                        </span>
                        <span class="inline-flex rounded-md shadow-sm py-1">
                            <form action="{{ route('admin.posts.edit', $post->id) }}">
                                  <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent
                                      text-sm leading-5 font-medium rounded-md text-white bg-indigo-500 hover:bg-indigo-400
                                      focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-600
                                      transition duration-150 ease-in-out">
                                        Редактировать
                                  </button>
                            </form>
                        </span>
                        <span class="inline-flex rounded-md shadow-sm py-1">
                            <form action="{{ route('admin.posts.destroy', $post->id) }}">
                                  <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent
                                      text-sm leading-5 font-medium rounded-md text-white bg-red-600 hover:bg-red-500
                                      focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-red-700
                                      transition duration-150 ease-in-out">
                                        Удалить
                                  </button>
                            </form>
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection('content)

