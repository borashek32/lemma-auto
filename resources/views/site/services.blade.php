@extends('layouts.site')

@section('title-block')Наши услуги@endsection('title-block')

@section('content')
    <div class="site-index">
        <div class="jumbotron ourServices">
            <ul class="list">
                <li class="listItem">Ремонт любой сложности</li>
                <li class="listItem">Качественно и в короткие сроки</li>
                <li class="listItem">Высококвалифицированный персонал</li>
            </ul>
            <h1>Наши услуги</h1>
            <h2 class="lead">Качество в деталях</h2>
            @include('includes.contact_button')
            @include('includes.messages_success')
            <div class="phone">
                Позвоните нам:<br>
                <a href="tel:+79999999999" class="textAddress">+7 999 9999999</a>
            </div>
        </div>
        <div class="body-content">
            <div class="row">
                <div class="col-lg-4">
                    <h2>Наши возможности</h2>
                    <p class="text">Наш сервисный центр располагает квалифицированными мастерами и всем
                        нелбходимым оборудованием.</p>
                    <p><a class="btn btn-outline-danger" href="{{ route('possibilities') }}">Подробнее &raquo;</a></p>
                    <h2>До и после</h2>
                    <p class="text">Мы сотрудничаем с ведущими оптовыми магазинами и базами запасных частей на грузовые автомобили.</p>
                    <p><a class="btn btn-outline-danger" href="{{ route('before') }}">Подробнее &raquo;</a></p>
                </div>
                <div class="col-lg-4">
                    <h3 class="titleCards">Ремонтные работы</h3>
                    <ul class="text">
                        <li>Двигателя,</li>
                        <li>Ходовой части,</li>
                        <li>Коробки передач,</li>
                        <li>Топливной системы,</li>
                        <li>Электроники,</li>
                        <li>Коробки передач АКПП и МКПП,</li>
                        <li>Двигателя,</li>
                        <li>Ходовой части,</li>
                        <li>Коробки передач,</li>
                        <li>Электроники,</li>
                        <li>Коробки передач АКПП и МКПП.</li>
                    </ul>
                    <p class="text">и другие виды диагностики</p>
                </div>
                <div class="col-lg-4">
                    <h3 class="titleCards">Диагностика</h3>
                    <ul class="text">
                        <li>основные кузовные работы и покраска автомобиля,</li>
                        <li>точное восстановление исходного цвета автомобиля, полировка деталей,</li>
                        <li>основные кузовные работы и покраска автомобиля,</li>
                        <li>точное восстановление исходного цвета автомобиля, полировка деталей,</li>
                        <li>основные кузовные работы и покраска автомобиля,</li>
                        <li>точное восстановление исходного цвета автомобиля, полировка деталей.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection('content')
