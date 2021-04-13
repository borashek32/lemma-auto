@extends('layouts.site')
@section('title-block')О нас@endsection('title-block')
@section('content')
    <div class="site-index">
        <div class="jumbotron blog">
            <ul class="list">
                <li class="listItem">Отзывчивые сотрудники</li>
                <li class="listItem">Помощь в подборе запасных частей</li>
                <li class="listItem">Всегда в оговоренные сроки</li>
            </ul>
            <h1>О нас</h1>
            <h2 class="lead">Качество в деталях</h2>
            @include('includes.contact_button')
            @include('includes.messages_success')
            <div class="phone">
                Позвоните нам:<br>
                <a href="tel:+79999999999" class="textAddress">+7 999 9999999</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">

        </div>

        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
            <div style="padding: 15px;">
                <div class="row">
                    @foreach($members as $member)
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                            <div class="card mb-4 shadow">
                                <ul class="list-group list-group-flush">
                                    <li style="font-size:12px;color:black;text-align:center;padding:0px;list-style: none;">
                                        {{ Date::parse($member->created_at)->format('j F Y') }}|
                                    </li>

                                    <li style="text-align: center" class="list-group-item">
                                        {{ $member->name }}
                                    </li>

                                    <li class="list-group-item" style="display:flex;justify-content: center;align-items:
                                    center;padding: 10px;overflow: hidden; ">
                                        <img src="{{ $member->photo }}" style="height: 100px; background-size: cover"
                                             alt="{{ $member->name }}" />
                                    </li>

                                    <li class="list-group-item" style="font-size:12px;text-align:center;padding:3px;">
                                        {{ $member->phone }}
                                    </li>

                                    <li class="list-group-item" style="font-size:12px;text-align:center;padding:3px;">
                                        {{ $member->position }}
                                    </li>

                                    <li class="list-group-item" style="font-size:12px;text-align:center;padding:3px;">
                                        {!! $member->description !!}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
            <livewire:user.advertisements.advertisements />
        </div>
    </div>
@endsection('content')
