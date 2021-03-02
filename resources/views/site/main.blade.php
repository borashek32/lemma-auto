@extends('layouts.site')

@section('title-block')Лемма-авто@endsection('title-block')

@section('content')
    <div class="container">
        <div class="site-index">
            <div class="jumbotron promo">
                <p>108814,<br>город Москва, поселение Сосенское,<br>
                    поселок Коммунарка, Бачуринская улица,<br>
                    дом 317Ю, офис 5а</p>
                <h1 class="spacePromo">Лемма Авто</h1>
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
                        <h3>Наши возможности</h3>
                        <p class="text">Мы располагаем современным оборудованием и квалифицированными специалистами.
                            Наши мастера произведут диагностику и ремонт вашего грузового авто в кратчайшие сроки,
                            что не приведет к долгосрочному простою вашей техники.</p>
                        <p><a class="btn btn-outline-danger" href="{{ route('possibilities') }}">Подробнее &raquo;</a></p>
                    </div>
                    <div class="col-lg-4">
                        <h3>Наши услуги</h3>
                        <p class="text">Наш грузовой автосервисный центр обеспечивает все виды диагностики и
                            предоставляет возможность оперативного ремонта выявленных неисправностей. Так же мы
                            осуществляем плановое техническое обслуживание грузового автотранспорта.</p>
                        <p><a class="btn btn-outline-danger" href="{{ route('services') }}">Подробнее &raquo;</a></p>
                    </div>
                    <div class="col-lg-4">
                        <h3>Магазин автозапчастей</h3>
                        <p class="text">Мы предоставляем возможность найти и купить запасные части по
                            оптимальной цене. Мы сотрудничаем с надежными магазинами автозапчастей,
                            а так же постоянно работаем над наполнением базы поставщиков.</p>
                        <p><a class="btn btn-outline-danger" href="{{ route('auto-parts') }}">Подробнее &raquo;</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection('content')
