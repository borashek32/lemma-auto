@extends('layouts.site')

@section('title-block')До и после ремонта@endsection('title-block')

@section('content')
    <div class="site-index">
        <div class="jumbotron beforeAfter">
            <ul class="list">
                <li class="listItem">Ремонт любых грузовых авто</li>
                <li class="listItem">Выполняем в сжатые сроки</li>
                <li class="listItem">Под вашим контролем</li>
            </ul>
            <h1>До и после ремонта</h1>
            <h2 class="lead">Качество в деталях</h2>
            @include('includes.contact_button')
            @include('includes.messages_success')
            <div class="phone">
                Позвоните нам:<br>
                <a href="tel:+79999999999" class="textAddress">+7 999 9999999</a>
            </div>
        </div>
    </div>
    <h5>Страница в разработке</h5>
@endsection('content')
