@extends('layouts.blog')
@section('title-block')Блог|Тег@endsection('title-block')
@section('description')<meta name="description" content="Полезные статьи по тегу - {{ $tag->name }}. Для удобства навигации по блогу статьи имеют несколько тегов. Ознакомьтесь со всеми статьями по данному вопросу." />@endsection('description')
@section('content')
<div style="padding: 15px;">
    
    <h1 style="text-align: center; margin-bottom:30px">Тег: #{{ $tag->name }}</h1>
    
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
@endsection('content')
