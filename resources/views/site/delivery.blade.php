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
                <h1 class="text-center">Доставка запасных частей:</h1>
                <div class="card shadow bg-body rounded" style="font-size: 14px;padding: 15px;">
                    <ul style="font-size: 16px;margin-left:20px;">
                        <li>
                            транспортной компанией
                        </li>
                        <p>
                            Крупногабаритные заказы доставляются только транспортными компаниями. Бесплатная доставка до транспортной компании.
                        </p>
                        <li>
                            курьером
                        </li>
                        <p>
                            Доставка в пределах МКАД и по ближайшему Подмосковью осуществляется курьерской службой "Достависта".
                            С актуальными тарифами вы можете ознакомиться на сайте Dostavista.ru.
                            Вы всегда можете вызвать к нам курьера через данный сервис.
                        </p>
                        <li>самовывоз</li>
                    </ul>
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
        <h1 class="text-center">Доставка запасных частей:</h1>
        <div class="card shadow bg-body rounded" style="font-size: 14px;padding: 15px;">
            <ul style="font-size: 16px;margin-left:20px;">
                <li>
                    транспортной компанией
                </li>
                <p>
                    Крупногабаритные заказы доставляются только транспортными компаниями.Бесплатная доставка до транспортной компании.
                </p>
                <li>
                    курьером
                </li>
                <p>
                    Доставка в пределах МКАД и по ближайшему Подмосковью осуществляется курьерской службой "Достависта".
                    С актуальными тарифами вы можете ознакомиться на сайте Dostavista.ru.
                    Вы всегда можете вызвать к нам курьера через данный сервис.
                </p>
                <li>самовывоз</li>
            </ul>
        </div>
        <div class="leftColumn">
            @include('includes.shop.left-column')
        </div>
    </div>
@endsection('content')
