@extends('layouts.blog')
@section('title-block')Автожурнал@endsection('title-block')
@section('content')
    <h3>Категория: {{ $category->name }}</h3>
    <div class="row">
        @foreach($category->posts as $post)
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                <div class="card mb-4 bg-dark">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item w-40" style="display: flex; justify-content: center;">
                            <img src="{{ url('/storage/docs/' . $post->img) }}" style="width: 200px; height: 100px" alt="{{ $post->title }}" />
                        </li>
                        <li class="list-group-item">{{ Date::parse($post->created_at)->format('j F Y') }}</li>
                        <li class="list-group-item">
                            <a href="/auto-magazine/{{ $post->slug }}" style="color: black">
                                <strong>
                                    {{ $post->title }}
                                </strong>
                            </a>
                        </li>
                        <li class="list-group-item" style="white-space: pre-wrap;">{{ Str::limit($post->body, 50) }}</li>
                        <li class="list-group-item"><a href="/auto-magazine/{{ $post->slug }}">Комментарии</a></li>
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
@endsection('content')
