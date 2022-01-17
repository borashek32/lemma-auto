@extends('layouts.site')
@section('title-block')Блог|Категория@endsection('title-block')
@section('description')<meta name="description" content="Полезные статьи в категории - {{ $category->name }}" />@endsection('description')
@section('content')
<div class="row">
    <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12" style="margin-bottom:20px">
        <livewire:user.blog.cats />
    </div>

    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
        @include('includes.blog.search')
        <livewire:user.blog.tags />
        <div class="card shadow bg-body rounded" style="padding: 15px;">
            <h3 style="text-align: center">
                Категория: {{ $category->name }}
            </h3>
    
            <div class="row">
                @forelse($category->posts as $post)
                    @include('includes.blog.card-post')
                @empty
                    <p class="text-center" style="margin-left: 6px">
                        Ничего не найдено по вашему запросу <strong>{{ request()->query('search') }}</strong>
                    </p>
                @endforelse
            </div>
        </div>
    </div>
    
    <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12">
        <div class="advertisements">
            <livewire:user.advertisements.advertisements />
        </div>
    </div>
</div>
@endsection('content')
