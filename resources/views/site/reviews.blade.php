@extends('layouts.site')
@section('title-block')Отзывы@endsection('title-block')
@section('content')
<h1>Оставьте ваш отзыв</h1>
<div class="site-contact contact">
    <div class="card shadow mb-4" style="padding:20px">
        <form method="POST" action="{{ route('reviews-form') }}">
            {{ csrf_field() }}
            @include('includes.messages_success')
            @if(auth()->user())
                <p style="font-weight:600;font-size:14px">{{ Auth::user()->name }}</p>
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-3">
                        <img src="/storage/{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}"
                             class="rounded float-start" width="100px" style="margin-right:10px">
                        <p style="font-size:10px">Зарегистрирован:<br>{{ Auth::user()->created_at->format('j F Y') }}</p>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-9 col-9">
                        <textarea name="body" rows="6" id="body" class="form-control commentForm"
                            placeholder="Введите ваш отзыв" required minlength="5" ></textarea>
                        <input type="submit" value="Добавить отзыв" class="btn btn-md btn-success"
                               style="width:150px;height:40px;margin-top:10px;margin-left:20px">
                    </div>
                </div>
            @else
                <p style="font-weight:600;font-size:14px">Войдите на сайт под своим именем или зарегистрируйтесь для того, чтобы оставить комментарий</p>
                <div class="row">
                    <div class="col-12">
                        <textarea name="body" rows="6" id="body" class="form-control"
                                  placeholder="Введите ваш отзыв" required minlength="5"></textarea>
                        <input type="submit" value="Добавить отзыв" class="btn btn-md btn-success"
                               style="width:150px;height:40px;margin-top:10px;">
                    </div>
                </div>
            @endif
        </form>
    </div>
    <div class="row">
        @foreach($reviews as $review)
            <div class="col-6">
                <div class="card shadow mb-4" style="margin-top:10px">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item w-40">
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-4">
                                    <p style="font-weight:600; font-size:14px">{{ $review->user->name }}</p>
                                </div>
                                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-8 col-8">
                                    <p style="margin-left:20px;font-size:12px">{{ Date::parse($review->created_at)->format('j F Y') }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-4">
                                    <img src="/storage/{{ $review->user->profile_photo_path }}" alt="{{ $review->user->name }}" class="rounded float-start" width="100px">
                                    <p style="font-size:10px">Зарегистрирован:<br>{{ Date::parse($review->user->created_at)->format('j F Y') }}</p>
                                </div>
                                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-8 col-8">
                                    <pre style="margin-left:20px;mergin-top:0px; margin-bottom:0px;margin-right: 0px">{{ $review->body }}</pre>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection('content')

