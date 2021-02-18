@extends('layouts.auto-parts')
@section('title-block')Магазин автозапчастей@endsection('title-block')
@section('content')
@include('shop.shop')
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
@endsection('content')
