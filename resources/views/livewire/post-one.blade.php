@extends('layouts.blog')
@section('title-block')Автожурнал@endsection('title-block')
@section('content')
    <div class="card mb-4 bg-dark">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Категория: {{ $post->category->name }}</li>
            <li class="list-group-item w-40" style="display: flex; justify-content: center;">
                <img src="{{ url('/storage/docs/' . $post->img) }}" width="400px" alt="{{ $post->title }}" />
            </li>
            <li class="list-group-item">{{ Date::parse($post->created_at)->format('j F Y') }}</li>
            <li class="list-group-item">
                <strong>
                    {{ $post->title }}
                </strong>
            </li>
            <li class="list-group-item"><pre>{{ $post->body }}</pre></li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                        <p style="color:red;font-weight:700;font-size:18px">
                            Нравится {{ $post->likes->count() }}
                        </p>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                        <livewire:likes />
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="card mb-4" style="padding:20px">
        <form method="POST" action="{{ route('comment', $post->id) }}">
            {{ csrf_field() }}
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            @if(auth()->user())
                <p style="font-weight:600;font-size:14px">{{ Auth::user()->name }}</p>
                <div class="row">
                    <div class="col-2">
                        <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="rounded float-start" width="100px">
                        <p style="font-size:10px">Зарегистрирован:<br>{{ Auth::user()->created_at->format('j F Y') }}</p>
                    </div>
                    <div class="col-10">
                        <textarea name="body" rows="4" id="body" class="form-control"
                                  placeholder="Введите ваш комментарий" required minlength="5"></textarea>
                        <input type="submit" value="Добавить комментарий" class="btn btn-md btn-success"
                               style="width:200px;height:40px;margin-top:10px;">
                    </div>
                </div>
            @else
                <p style="font-weight:600;font-size:14px">Войдите на сайт под своим именем или зарегистрируйтесь для того, чтобы оставить комментарий</p>
                <div class="row">
                    <div class="col-12">
                        <textarea name="body" rows="4" id="body" class="form-control"
                                  placeholder="Введите ваш комментарий" required minlength="5"></textarea>
                        <input type="submit" value="Добавить комментарий" class="btn btn-md btn-success"
                               style="width:200px;height:40px;margin-top:10px;">
                    </div>
                </div>
            @endif
        </form>
    </div>
    <h5 style="margin-top:40px">Комментарии ({{ $post->comments->count() }})</h5>
    @foreach($post->comments as $comment)
        <div class="card mb-4 bg-primary" style="margin-top:10px">
            <ul class="list-group list-group-flush">
                <li class="list-group-item w-40">
                    <p style="font-weight:600; font-size:14px">{{ $comment->user->name }}</p>
                    <div class="row">
                        <div class="col-2">
                            <img src="{{ $comment->user->profile_photo_url }}" alt="{{ $comment->user->name }}" class="rounded float-start" width="100px">
                            <p style="font-size:10px">Зарегистрирован:<br>{{ Date::parse($comment->user->created_at)->format('j F Y') }}</p>
                        </div>
                        <div class="col-10">
                            <p style="margin-bottom:10px;font-size:12px">{{ Date::parse($comment->created_at)->format('j F Y') }}</p>
                            <p>{{ $comment->body }}</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    @endforeach
@endsection('content')
