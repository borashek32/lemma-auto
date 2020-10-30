@extends('layouts.site')

@section('title-block')Магазин автозапчастей@endsection('title-block')

@section('content')
    <div class="site-index">
        <div class="jumbotron autoParts">
            <ul class="list">
                <li class="listItem">Помогаем в подборе</li>
                <li class="listItem">Доставляем в сжатые сроки</li>
                <li class="listItem">Запчасти на любые грузовые авто</li>
            </ul>
            <h1>Магазин автозапчастей</h1>
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
                <h2>Доставка и оплата</h2>
                <p class="text">Мы доставляем запасные части на ваши автомибили любым удобным вам способом:</p>
                <ul>
                    <li>курьерская служба,</li>
                    <li>транспортная компания,</li>
                    <li>самовывоз.</li>
                </ul>
                <p class="text">Мы принимаем оплату наличным и безналичным рачетом.</p>
            </div>
            <div class="col-lg-4">
                <h2>Наши партнеры</h2>
                <p class="text">Мы предоставляем возможность найти и купить запасные части по
                    оптимальной цене. Мы сотрудничаем с надежными магазинами автозапчастей,
                    а так же постоянно работаем над наполнением базы поставщиков.</p>
                <p><a class="btn btn-outline-danger" href="{{ route('partners') }}">Подробнее &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Гарантии</h2>
                <p class="text">Мы даем гарантию на запасные части сроком на один календарный год, согласно гарантийным обязательствам
                    завода-изготовителя и закону о защите прав потребителя.</p>
                <p><a class="btn btn-outline-danger" href="{{ route('law') }}">Подробнее &raquo;</a></p>
            </div>
        </div>
    </div>
@endsection('content')
