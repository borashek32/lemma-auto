@extends('layouts.blog')
@section('title-block')Блог|Категория@endsection('title-block')
@section('description')<meta name="description" content="Полезные статьи в категории - {{ $category->name }}" />@endsection('description')
@section('content')
<div style="padding: 15px;">
    <h1 style="text-align: center; margin-bottom:30px">
        Категория: {{ $category->name }}
    </h1>

    <div class="row">
        @forelse($category->posts as $post)
            @include('includes.blog.card-post')
        @empty
            <p class="text-center" style="margin-left: 6px">
                Ничего не найдено по вашему запросу <strong>{{ request()->query('search') }}</strong>
            </p>
        @endforelse
    </div>
</div> 
@endsection('content')
