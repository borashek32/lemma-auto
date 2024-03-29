@extends('layouts.blog')
@section('title-block')Блог|{{ $post->title }}@endsection('title-block')
@section('description')<meta name="description" content="Статья на тему - {{ $post->title }}, в категории - {{ $post->category->name }}. В наших статьях вы найдете ответы на часто задаваемые вопросы о VIN-номере автомобиля и о каталожном номере автозапчасти." />@endsection('description')
@section('content')
    <h1 style="text-align: center; margin-bottom:30px;margin-top:30px">
        {{ $post->title }}
    </h1>

    <div class="row">
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
            <livewire:user.blog.cats />
        </div>

        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
            @include('includes.blog.search')
            <livewire:user.blog.tags />

            <div style="padding: 10px;">
                <div class="mb-4">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item w-40" 
                        style="display: flex; justify-content: center;">
                            <a href="#popup">
                                <img src="{{ url($post->img) }}" 
                                style="height:auto" class="img-md" 
                                width="600px" alt="{{ $post->title }}" />
                            </a>
                        </li>

                        {{-- popup start --}}
                        <div id="popup" class="popup">
                            <a href="#header" class="popup__area"></a>

                            <div class="popup__body">
                                <div class="popup__content">
                                    <a href="#header" class="popup__close">
                                       <img src="/img/close.png" alt="закрыть окно" width="15"> 
                                    </a>
                                    
                                    <div class="popup__img">
                                        <img src="{{ url($post->img) }}" 
                                        style="height:auto" 
                                        alt="{{ $post->title }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- popup end --}}

                        
                        <style>
                            @media (max-width: 1000px) {
                                .img-md {
                                    width: 450px;
                                }
                                .popup {
                                    display: none;
                                }
                            }
                            @media (max-width: 450px) {
                                .img-sm {
                                    width: 300px;
                                }
                            }
                            @media (max-width: 360px) {
                                .img-sm {
                                    width: 200px;
                                }
                            }
                            @media (max-width: 300px) {
                            .img-sm {
                                width: 150px;
                            }
                        }
                    </style>

                    <li class="list-group-item">
                        <p style="font-size:18px;margin:0px;">
                            Категория: {{ $post->category->name }}
                        </p>

                        <p style="font-size:12px;margin:0px;">
                            {{ Date::parse($post->created_at)->format('j F Y') }}
                        </p>
                    </li>
                    
                    <li class="list-group-item">
                        @foreach($post->tags as $tag)
                            <a href="{{ route('tag', $tag->name) }}">#{{ $tag->name }}</a>
                        @endforeach
                    </li>

                    <li class="list-group-item trix-content">
                        <div class="trix-content">{!! $post->page_text !!}</div>
                    </li>

                    <li class="list-group-item">
                        @include('includes.blog.likes')
                    </li>
                    
                    <li class="list-group-item trix-content">
                        <p>Поделиться:</p>
                        @include('includes.blog.sharingbuttons')
                        <?php
                            showSharer("http://lemma-auto.ru/blog/{$post->slug}", "Новый пост на lemma-auto.ru");
                        ?>
                    </li>

                    <li class="list-group-item">
                        <p style="color:black;font-size:18px;">
                            Оставьте ваш комментарий:
                        </p>
                        @comments(['model' => $post])
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
            <div class="advertisements" style="">
                <livewire:user.advertisements.advertisements />
            </div>
        </div>
    </div>
@endsection('content')
