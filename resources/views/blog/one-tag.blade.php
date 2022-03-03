@extends('layouts.blog')
@section('title-block')Блог|Тег@endsection('title-block')
@section('description')<meta name="description" content="Полезные статьи по тегу - {{ $tag->name }}. Для удобства навигации по блогу статьи имеют несколько тегов. Ознакомьтесь со всеми статьями по данному вопросу." />@endsection('description')
@section('content')
    <h1 style="text-align: center; margin-bottom:30px;margin-top:30px">
        Тег: #{{ $tag->name }}
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
                            Ничего не найдено по вашему запросу <strong>{{ request()->query('search') }}</strong>
                        </p>
                    @endforelse
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
