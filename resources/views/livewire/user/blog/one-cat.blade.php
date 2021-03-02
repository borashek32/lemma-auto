@extends('layouts.blog')
@section('title-block')Автожурнал@endsection('title-block')
@section('content')
    <h3>Категория: {{ $category->name }}</h3>
    <div class="row">
        @forelse($category->posts as $post)
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                <div class="card shadow mb-5 bg-body rounded">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" style="text-align:center;padding:0px;">
                            <a href="{{ route('category', $post->category->slug) }}"
                               style="font-size:12px;color:dimgrey;">
                                {{ $post->category->name }}
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="/auto-magazine/posts/{{ $post->slug }}" style="color: black">
                                <strong>
                                    {{ $post->title }}
                                </strong>
                            </a>
                        </li>
                        <li class="list-group-item"
                            style="display:flex;justify-content: center;align-items: center;padding: 10px;
                        overflow: hidden; ">
                            <a href="/auto-magazine/posts/{{ $post->slug }}" style="color: black">
                                <img src="{{ url('/storage/docs/' . $post->img) }}"
                                     style="height: 100px; background-size: cover"
                                     alt="{{ $post->title }}" />
                            </a>
                        </li>
                        <li class="list-group-item" style="font-size:12px;text-align:center;padding:3px;">
                            {{ Date::parse($post->created_at)->format('j F Y') }}
                            <a class="img-responsive" href="/auto-magazine/posts/{{ $post->slug }}">|
                                Комментарии ({{ $post->comments->count() }})
                            </a>
                        </li>
                        <li class="list-group-item" style="font-size: 14px;">
                            {{ Str::limit($post->body, 50) }}
                        </li>
                    </ul>
                </div>
            </div>
        @empty
            <p class="text-center">
                Ничего не найдено по вашему запросу <strong>{{ request()->query('search') }}</strong>
            </p>
        @endforelse
    </div>
@endsection('content')
