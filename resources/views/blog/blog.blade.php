@extends('layouts.blog')
@section('title-block')Блог@endsection('title-block')
@section('description')<meta name="description" content="В наших статьях вы найдете советы по подбору запасных частей на ваш автомобиль по VIN номеру в каталогах. Мы подробно разбираем, что такое каталожный номер запасной части (номер по каталогу или артикул запчсати)." />@endsection('description')
@section('content')
    <div style="padding: 10px;">
        <h1 style="text-align: center; margin-bottom:30px">
            Автоблог
        </h1>

        <div class="row">
            @forelse($posts as $post)
                @include('includes.blog.card-post')
            @empty
                <p class="text-center" style="margin-left: 6px">
                    Ничего не найдено по вашему запросу <strong>{{ request()->query('search') }}</strong>
                </p>
            @endforelse
        </div>
        <div style="display: flex;justify-content: center">
            {{ $posts->appends(['search' => request()->query('search')])->links() }}
        </div>
    </div>
@endsection('content')
