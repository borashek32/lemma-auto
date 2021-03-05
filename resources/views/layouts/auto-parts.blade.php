<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title-block')</title>
    <link rel="shortcut icon" href="/img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">
</head>
<body>
@include('includes.header')
<div class="container">
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
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                    <h4>Доставка и оплата</h4>
                    <p class="text">Мы доставляем запасные части на ваши автомибили любым удобным вам способом:</p>
                    <ul>
                        <li>курьерская служба,</li>
                        <li>транспортная компания,</li>
                        <li>самовывоз.</li>
                    </ul>
                    <p class="text">Мы принимаем оплату наличным и безналичным рачетом.</p>
                </div>
                @yield('content')
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                    <h4>Наши партнеры</h4>
                    <p class="text">Мы предоставляем возможность найти и купить запасные части по
                        оптимальной цене. Мы сотрудничаем с надежными магазинами автозапчастей,
                        а так же постоянно работаем над наполнением базы поставщиков.</p>
                    <p><a class="btn btn-outline-danger" href="{{ route('partners') }}">Подробнее &raquo;</a></p>

                    <h4>Гарантии</h4>
                    <p class="text">Мы даем гарантию на запасные части сроком на один календарный год, согласно гарантийным обязательствам
                        завода-изготовителя и закону о защите прав потребителя.</p>
                    <p><a class="btn btn-outline-danger" href="{{ route('law') }}">Подробнее &raquo;</a></p>
                </div>
            </div>
        </div>
        @include('includes.footer')
    </div>
</div>
<div id='app'></div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
