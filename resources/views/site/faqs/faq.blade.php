@extends('layouts.site')
@section('title-block')Ответы на частые вопросы FAQ @endsection('title-block')
@section('description')<meta name="description" content="Правила использования сайта компании ООО Лемма-авто" />@endsection('description')
@section('content')
<div class="autoparts-big">
    <div class="row">
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
            <div class="leftColumn">
                @include('includes.shop.left-column')
            </div>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
            <h1 class="text-center">Задайте ваш вопрос</h1>
            <p style="font-size:12px">*если вы не нашли его в списке ниже</p>
            <p>
                На электронный адрес, указанный при регистрации придет ответ на ваш вопрос в течение нескольких дней. Если возникла срочная проблема, обратитесь к техническому специалисту:
                <br>
                <a href="tel:+79169174630" style="margin-top: -10px;color:blue">
                    +7 (916) 917-46-30
                </a>
            </p>
    
            <div class="card shadow bg-body rounded" style="font-size: 14px;padding: 15px;">
                <form method="POST" action="{{ route('faq-form') }}">
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
                                <textarea name="question" rows="6" id="question" class="form-control commentForm"
                                          placeholder="Введите ваш вопрос" required minlength="5" ></textarea>
    
                                    <input type="submit" value="Задать вопрос" class="btn btn-md btn-success"
                                           style="width:150px;height:40px;margin-top:10px;margin-left:20px">
                            </div>
                        </div>
                    @else
                        <p style="font-weight:600;font-size:14px">Войдите на сайт под своим именем или зарегистрируйтесь для того, чтобы задать вопрос</p>
                        <div class="row">
                            <div class="col-12">
                            <textarea name="body" rows="6" id="body" class="form-control"
                                      placeholder="Введите ваш вопрос" required minlength="5"></textarea>
    
                                <input type="submit" value="Задать вопрос" class="btn btn-md btn-success"
                                       style="width:150px;height:40px;margin-top:10px;">
                            </div>
                        </div>
                    @endif
                </form>
            </div>
            <div class="row">
                @foreach($faqs as $faq)
                    <div class="col-12">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <a href="{{ route('faq-one', $faq->slug) }}">
                                    <p style="margin-left:20px;margin-top:10px; margin-bottom:0px;margin-right: 0px;text-align:left">
                                        {!! $faq->question !!}
                                    </p>
                                </a>
                            </div>
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

<div class="autoparts-small p-8">
    <h1>Введите ваш вопрос</h1>
    <div class="card shadow bg-body rounded" style="font-size: 14px;padding: 15px; text-align: left">
        <form method="POST" action="{{ route('faq-form') }}">
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
                        <textarea name="question" rows="6" id="question" class="form-control commentForm"
                                  placeholder="Введите ваш вопрос" required minlength="5" ></textarea>

                        <input type="submit" value="Задать вопрос" class="btn btn-md btn-success"
                               style="width:150px;height:40px;margin-top:10px;margin-left:20px">
                    </div>
                </div>
            @else
                <p style="font-weight:600;font-size:14px">Войдите на сайт под своим именем или зарегистрируйтесь для того, чтобы задать вопрос</p>
                <div class="row">
                    <div class="col-12">
                        <textarea name="body" rows="6" id="body" class="form-control"
                              placeholder="Введите ваш вопрос" required minlength="5"></textarea>

                        <input type="submit" value="Добавить вопрос" class="btn btn-md btn-success"
                               style="width:150px;height:40px;margin-top:10px;">
                    </div>
                </div>
            @endif
        </form>
    </div>
    <div class="row">
        @foreach($faqs as $faq)
            <div class="col-md-12 col-sm-12 col-12">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <a href="{{ route('faq-one', $faq->slug) }}">
                            <p style="margin-left:0px;margin-top:10px; margin-bottom:0px;margin-right: 0px;text-align:left">
                                {!! $faq->question !!}
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="leftColumn">
        @include('includes.shop.left-column')
    </div>
</div>
@endsection('content')
