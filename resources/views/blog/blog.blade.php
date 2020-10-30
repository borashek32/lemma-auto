@extends('layouts.site')
@section('title-block')Автожурнал@endsection('title-block')
@section('content')
    <div class="container">
        <div class="site-index">
            <div class="jumbotron blog">
                <p>108814,<br>город Москва, поселение Сосенское,<br>
                    поселок Коммунарка, Бачуринская улица,<br>
                    дом 317Ю, офис 5а</p>
                <h1 class="spacePromo">Автожурнал: блог обо всем</h1>
                <h2 class="lead">Последние новости</h2>
                @include('includes.contact_button')
                @include('includes.messages_success')
                <div class="phone">
                    Позвоните нам:<br>
                    <a href="tel:+79999999999" class="textAddress">+7 999 9999999</a>
                </div>
            </div>
            <div class="body-content">
                <div class="row">
                    <contact-component :urldata="{{ json_encode($posts) }}"></contact-component>
                    <div class="col-lg-6 col-xl-6 col-md-6">
                        @foreach($posts as $post)
                            <div class="alert alert-info">
                                <h6>{{ $post->title }}</h6>
                                <p>{{ $post->text }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection('content')


