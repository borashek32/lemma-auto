@extends('layouts.blog')
@section('title-block')Блог@endsection('title-block')
@section('description')<meta name="description" content="В наших статьях вы найдете советы по подбору запасных частей на ваш автомобиль по VIN номеру в каталогах. Мы подробно разбираем, что такое каталожный номер запасной части (номер по каталогу или артикул запчсати)." />@endsection('description')
@section('content')
    <h1 class="text-center" style="margin-bottom:30px;margin-top:30px">
        Автоблог
    </h1>

    <div class="row">
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
            <livewire:user.blog.cats />
        </div>

        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
            @include('includes.blog.search')
            <livewire:user.blog.tags />

            <div style="padding: 10px;">
                <div class="row">  
                    @forelse($posts as $post)
                        @include('includes.blog.card-post')
                    @empty
                        <p class="text-center" style="margin-left: 6px">
                            Ничего не найдено по вашему запросу <strong>{{ $search }}</strong>
                        </p>
                    @endforelse
                </div>
                <div style="display: flex;justify-content: center">
                    {{ $posts->appends(['search' => request()->query('search')])->links() }}
                </div>
            </div>
        </div>

        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
            <div class="advertisements" style="">
                <livewire:user.advertisements.advertisements />
            </div>
        </div>
    </div>
@endsection('content')
