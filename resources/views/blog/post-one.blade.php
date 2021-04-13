@extends('layouts.blog')
@section('title-block')Автожурнал@endsection('title-block')
@section('content')
    <div class="card mb-4 shadow">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <p class="text-center m-0" style="font-weight:600">
                    {{ $post->title }}
                </p>
            </li>

            <li class="list-group-item w-40" style="display: flex; justify-content: center;">
                <img src="{{ url($post->img) }}" width="400px" alt="{{ $post->title }}" />
            </li>

            <li class="list-group-item">
                <p style="font-size:14px;margin:0px;">
                    Категория: {{ $post->category->name }}
                </p>

                <p style="font-size:12px;margin:0px;">
                    {{ Date::parse($post->created_at)->format('j F Y') }}
                </p>
            </li>

            <li class="list-group-item trix-content">
                <div class="trix-content">{!! $post->page_text !!}</div>
            </li>

            <li class="list-group-item">
                @include('includes.blog.likes')
            </li>
        </ul>
    </div>
    <div class="card shadow mb-4" style="padding:20px">
        @include('includes.blog.comment')
    </div>

    <h5 style="margin-top:40px">Комментарии ({{ $post->comments->count() }})</h5>
    @foreach($post->comments as $comment)
        <div class="card shadow mb-4" style="margin-top:10px">
            <ul class="list-group list-group-flush">
                <li class="list-group-item w-40">
                    <div class="row">
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-3">
                            <p style="font-weight:600; font-size:14px">{{ $comment->user->name }}</p>
                        </div>

                        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-9 col-9">
                            <p style="margin-bottom:10px;font-size:12px">{{ Date::parse($comment->created_at)->format('j F Y') }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-3">
                            <img src="/storage/{{ $comment->user->profile_photo_path }}" alt="{{ $comment->user->name }}" class="rounded float-start" width="100px">
                            <p style="font-size:10px">Дата<br>регистрации:<br>{{ Date::parse($comment->user->created_at)->format('j F Y') }}</p>
                        </div>

                        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-9 col-9">
                            <pre style="margin: 0px">{{ $comment->body }}</pre>
                        </div>
                    </div>
                </li>

                <li class="list-group-item w-40">
                    @include('includes.blog.reply')
                </li>

                @foreach($comment->replies as $reply)
                    <li class="list-group-item w-40">
                        <p style="font-weight:700;margin-left:80px;font-size:14px;">{{ $reply->user->name }}</p>
                        <div class="row" style="margin-left:60px;">
                            <div class="col-2">
                                <img src="/storage/{{ $reply->user->profile_photo_path }}" alt="{{ $reply->user->name }}" class="rounded float-start" width="60px">
                                <p style="font-size:8px">Зарегистрирован:<br>{{ Date::parse($reply->user->created_at)->format('j F Y') }}</p>
                            </div>
                            <div class="col-10">
                                <p style="font-size:12px;margin-left:-20px;">{{ Date::parse($reply->created_at)->format('j F Y') }}</p>
                                <p style="margin-left:-20px;margin-top:-10px;">{{ $reply->body }}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
@endsection('content')
