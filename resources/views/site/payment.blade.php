@extends('layouts.site')

@section('title-block')Магазин автозапчастей@endsection('title-block')

@section('content')
    <div class="autoparts-big">
        <div class="row">
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                <div class="leftColumn">
                    @include('includes.shop.left-column')
                </div>
            </div>

            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                <h1 class="text-center">Оплата запасных частей:</h1>
                <div class="card shadow bg-body rounded" style="font-size: 14px;padding: 15px;">
                    <p style="font-size: 14px">Мы принимаем оплату наличным и безналичным рачетом.</p>
                    <p style="font-size: 14px">В настоящее время механизм оплаты картой через сайт в разработке.</p>
                    <p style="font-size: 14px">Возможна оплата переводом на карту по предварительной договоренности с менеджером.</p>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                <div class="advertisements">
                    <livewire:user.advertisements.advertisements />
                </div>
            </div>
        </div>
    </div>

    <div class="autoparts-small p-8">
        <h1 class="text-center">Оплата запасных частей:</h1>
        <div class="card shadow bg-body rounded" style="font-size: 14px;padding: 15px;">
            <p style="font-size: 16px">Мы принимаем оплату наличным и безналичным рачетом.</p>
            <p style="font-size: 16px">В настоящее время механизм оплаты картой через сайт в разработке.</p>
            <p style="font-size: 16px">Возможна оплата переводом на карту по предварительной договоренности с менеджером.</p>
        </div>
        <div class="leftColumn">
            @include('includes.shop.left-column')
        </div>
    </div>
@endsection('content')
