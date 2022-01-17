@extends('layouts.site')
@section('title-block')Блог|{{ $post->title }}@endsection('title-block')
@section('description')<meta name="description" content="Статья на тему - {{ $post->title }}, в категории - {{ $post->category->name }}. В наших статьях вы найдете ответы на часто задаваемые вопросы о VIN-номере автомобиля и о каталожном номере автозапчасти." />@endsection('description')
@section('content')
<div class="row">
    <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12" style="margin-bottom:20px">
        <livewire:user.blog.cats />
    </div>

    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
        @include('includes.blog.search')
        <livewire:user.blog.tags />
        <div class="card mb-4 shadow">
            <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <p class="text-center m-0" style="font-weight:600">
                    {{ $post->title }}
                </p>
            </li>

            <li class="list-group-item w-40" style="display: flex; justify-content: center;">
                <img src="{{ url($post->img) }}" style="height:auto" class="img-sm" width="400px" alt="{{ $post->title }}" />
            </li>
            
            <style>
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
                @comments(['model' => $post])
            </li>
        </ul>
        </div>
    </div>
    
    <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12">
        <div class="advertisements">
            <livewire:user.advertisements.advertisements />
        </div>
    </div>
</div>
@endsection('content')
