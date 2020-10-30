@section('title-block')Отзывы клиентов@endsection('title-block')
@extends('layouts.admin')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <ul>
                <li>
                    <div class="py-5">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <h1>Отзывы</h1>
                            <div>
                                @foreach($reviews as $review)
                                    <div class="md:grid md:grid-cols-1 md:gap-6 py-5">
                                        <div class="mt-10 md:mt-0 md:col-span-2">
                                            <form action="{{ route('admin.reviews') }}" method="POST">
                                                <div class="shadow sm:rounded-md sm:overflow-hidden">
                                                    <div class="px-10 py-5 bg-white sm:p-6">
                                                        <div class="md:grid md:grid-cols-1 md:gap-6">
                                                            <div class="mt-5 md:mt-0 md:col-span-2">
                                                                <h6>{{ $review->name }}</h6>
                                                                <h7>{{ $review->created_at }}</h7>
                                                                <p>{{ $review->message }}</p>
                                                            </div>
                                                        </div>
                                                        <form action="{{ route('admin.reviews.destroy', $review) }}" method="DELETE">
{{--                                                            <input type="hidden" name="_method" value="DELETE">--}}
{{--                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                                                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent
                                                              text-sm leading-5 font-medium rounded-md text-white bg-red-600 hover:bg-red-500
                                                              focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-red-700
                                                              transition duration-150 ease-in-out">
                                                                Удалить
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection('content)

