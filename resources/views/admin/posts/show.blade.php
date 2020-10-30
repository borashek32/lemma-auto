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
                    <tr>
                        <form action="{{ route('admin.posts.show', $post) }}" method="GET">
                            @csrf
                            <td>
                                {{ $post->created_at }}
                            </td>
                            <td class="px-6 py-1 whitespace-no-wrap">
                                <div class="flex items-center">
                                    <div class="md:grid md:grid-cols-2 md:gap-6 py-5">
                                        <div class="mt-10 md:mt-0 md:col-span-2">
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
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </form>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection('content)


