@extends('layouts.site')
@section('title-block')Отзывы клиентов@endsection('title-block')
@section('description')<meta name="description" content="Магазин Лемма-авто сотрудничает с оптовыми и частными покупателями по России и хорошо зарекомендовал себя. На странице отзывов вы можете ознакомиться с мнением наших клиентов о магазине, а также оставить свой отзыв." />@endsection('description')
@section('content')
<div class="autoparts-big">
    <h1 style="text-align: center;margin-bottom:30px;margin-top:30px">
        Оставьте ваш отзыв
    </h1>
    <div class="row">
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
            <div class="leftColumn">
                @include('includes.shop.left-column')
            </div>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
            <div class="card shadow bg-body rounded" style="font-size: 14px;padding: 15px;">
                <form method="POST" action="{{ route('reviews-form') }}">
                    {{ csrf_field() }}
                    @if(auth()->user())
                        <div class="row">
    
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-3">
                                <p style="font-weight:600;font-size:14px">{{ Auth::user()->name }}</p>
                                <img src="/storage/{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}"
                                     class="rounded float-start" width="100px" style="margin-right:10px">
    
                                <p style="font-size:8px">Зарегистрирован/а:
                                    <br>
                                    {{ Date::parse(Auth::user()->created_at)->format('j F Y') }}
                                </p>
                            </div>
                            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-9 col-9">
                                <p>Сегодня: {{ Date::now()->format('j F Y') }}</p>
                                <textarea name="body" rows="6" id="body" class="form-control commentForm"
                                          placeholder="Введите ваш отзыв" required minlength="5" ></textarea>
    
                                    <input type="submit" value="Добавить отзыв" class="btn btn-md btn-success"
                                           style="width:150px;height:40px;margin-top:10px;margin-left:20px">
                            </div>
                        </div>
                    @else
                        <p style="font-weight:600;font-size:14px">Войдите на сайт под своим именем или зарегистрируйтесь для того, чтобы оставить отзыв</p>
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
                                            <p style="font-weight:600; font-size:12px">{{ $review->user->name }}</p>
                                            
                                            <img src="/storage/{{ $review->user->profile_photo_path }}" alt="{{ $review->user->name }}"
                                                 class="rounded float-start" width="100px">
    
                                            <p style="font-size:8px">Зарегистри-<br>рован/а:
                                                <br>
                                                {{ Date::parse($review->user->created_at)->format('j F Y') }}
                                            </p>
                                        </div>
                                        
                                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-8 col-8">
                                            <p style="margin-left:20px;font-size:12px">{{ Date::parse($review->created_at)->format('j F Y') }}</p>
                                       
                                            <pre style="margin-left:20px;mergin-top:0px; margin-bottom:0px;margin-right: 0px">{!! $review->body !!}</pre>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                <div class="advertisements">
                    <livewire:user.advertisements.advertisements />
                </div>
            </div>
        </div>
    </div>
</div>

<div class="autoparts-small p-8">
    <h1 style="text-align: center;margin-bottom:30px;margin-top:30px">
        Оставьте ваш отзыв
    </h1>
    <div class="card shadow bg-body rounded" style="font-size: 14px;padding: 15px;">
        <form method="POST" action="{{ route('reviews-form') }}">
            {{ csrf_field() }}
            @if(auth()->user())
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-3">
                        <p style="font-weight:600;font-size:14px">{{ Auth::user()->name }}</p>
                        <img src="/storage/{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}"
                             class="rounded float-start" width="100px" style="margin-right:10px">

                        <p style="font-size:8px">Зарегистрирован/а:
                            <br>
                            {{ Date::parse(Auth::user()->created_at)->format('j F Y') }}
                        </p>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-9 col-9">
                        <p>Сегодня: {{ Date::now()->format('j F Y') }}</p>
                        <textarea name="body" rows="6" id="body" class="form-control commentForm"
                                  placeholder="Введите ваш отзыв" required minlength="5" ></textarea>

                        <input type="submit" value="Добавить отзыв" class="btn btn-md btn-success"
                               style="width:150px;height:40px;margin-top:10px;margin-left:20px">
                    </div>
                </div>
            @else
                <p style="font-weight:600;font-size:14px">Войдите на сайт под своим именем или зарегистрируйтесь для того, чтобы оставить отзыв</p>
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
            <div class="col-md-6 col-sm-12 col-12">
                <div class="card shadow mb-4" style="margin-top:10px">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item w-40">
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-4">
                                    <p style="font-weight:600; font-size:12px">{{ $review->user->name }}</p>
                                    
                                    <img src="/storage/{{ $review->user->profile_photo_path }}" alt="{{ $review->user->name }}"
                                         class="rounded float-start" width="100px">

                                    <p style="font-size:8px">Зарегистри-<br>рован/а:
                                        <br>
                                        {{ Date::parse($review->user->created_at)->format('j F Y') }}
                                    </p>
                                </div>
                                
                                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-8 col-8">
                                    <p style="margin-left:20px;font-size:12px">{{ Date::parse($review->created_at)->format('j F Y') }}</p>
                               
                                    <pre style="margin-left:20px;mergin-top:0px; margin-bottom:0px;margin-right: 0px">{!! $review->body !!}</pre>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
    <div class="leftColumn">
        @include('includes.shop.left-column')
    </div>
</div>
@endsection('content')

