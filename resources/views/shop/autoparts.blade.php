@extends('layouts.site')
@section('title-block')Магазин автозапчастей@endsection('title-block')
@section('description')<meta name="description" content="интернет-магазин купить автозапчасти каталожный номер детали широкий ассортимент расходные материалы доступные цены консультация специалиста пункты самовывоза Москва Коммунарка" />@endsection('description')
@section('keywords')<meta name="keywords" content="интернет-магазин купить автозапчасти каталожный номер детали широкий ассортимент расходные материалы доступные цены консультация специалиста пункты самовывоза Москва Коммунарка" />@endsection('keywords')
@section('content')
<div class="autoparts-big">
    <h1 class="text-center" style="margin-bottom:30px;margin-top:30px">
        Автозапчасти по каталожному номеру
    </h1>
    <div class="row">
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
            <div class="leftColumn">
                @include('includes.shop.left-column')
            </div>
        </div>

        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
            <div class="card shadow bg-body rounded" style="font-size: 14px;padding: 15px;">
                {{-- @if(auth()->user()) --}}
                    @include('includes.shop.search')
                {{-- @else --}}
                    {{-- <p>Войдите на сайт род своим именем или зарегистрируйтесь</p>
                    <a href="{{ route('login') }}" style="color:black;margin-right:6px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" style="margin-top:-4px" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                            <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                        </svg>
                        Вход
                    </a>
                    <a href="{{ route('register') }}" style="color:black;margin-top:4px">
                        <svg xmlns="http://www.w3.org/2000/svg" style="margin-top:-4px" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                        </svg>
                        Регистрация
                    </a>
                    <br>
                    <br>
                @endif --}}

                @if(!empty($search))
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="text-center">Каталожный<br>номер</th>
                            <th class="text-center">Название</th>
                            <th class="text-center">Цена</th>
                            <th class="text-center">Остаток<br>на складе</th>
                            <th class="text-center">Срок<br>доставки</th>
                            <th class="text-center">Заказать</th>
                        </tr>
                        </thead>

                        @forelse($products as $product)
                            @if($product->count > 0)
                                <tbody>
                                <tr>
                                    <form action="{{ route('cart.store') }}" style="height: 35px;padding-bottom: 3px" method="POST">
                                        @csrf
                                        <td>{{ $product->number }}</td>
                                        <td style="white-space: pre-line">{{$product->brand}}, {{ $product->name }}</td>
                                        <td>{{ $product->price }} руб.</td>
                                        <td>{{ $product->count }} шт.</td>
                                        <td>
                                            @if($product->warehouses) 
                                                @foreach($product->warehouses as $warehouse)
                                                    @if($warehouse->id !== 'F453103A-DA12-11E9-A2F0-005056802F4C')
                                                        {{ date("d.m.y", strtotime($warehouse->shipmentDate)) }}
                                                    @else
                                                        {{ date("d.m.y", strtotime($warehouse->shipmentDate)) }}
                                                    @endif
                                                    @break
                                                @endforeach
                                            @else
                                                {{ $product->shipmentDate }} дн.    
                                            @endif
                                        </td>

                                        <td style="display: flex; justify-items: center">
                                            <input type="hidden" name="goodsID" value="{{ $product->goodsID }}">
                                            <input type="hidden" name="title" value="{{ $product->name }}">
                                            <input type="hidden" name="price" value="{{ $product->price }}">
                                            <input type="hidden" name="stock_quantity" value="{{ $product->count }}">
                                            <input type="hidden" name="brand" value="{{ $product->brand }}">
                                            <input type="hidden" name="code" value="{{ $product->number }}">
                                            @if($product->warehouses)
                                                <input type="hidden" name="shipment_date" value="{{ $warehouse->shipmentDate }}">
                                            @else
                                                <input type="hidden" name="shipment_date" value="{{ $product->shipmentDate }}">
                                            @endif

                                            <button type="submit" style="width: 100px; height: 36px" class="btn btn-secondary">
                                                <p class="text" id="demo">
                                                    В корзину
                                                </p>
                                            </button>
                                        </td>
                                    </form>
                                </tr>
                                </tbody>
                            @else
                                <p class="text-center">
                                    Ничего не найдено по вашему запросу <strong>{{ request()->query('search') }}</strong>
                                </p>    
                            @endif
                        @empty
                            <p class="text-center">
                                Ничего не найдено по вашему запросу <strong>{{ request()->query('search') }}</strong>
                            </p>
                        @endforelse
                    </table>
                @else
                    <div class="mt-20" style="font-size: 12px">
                        Вы можете найти нужную автозапчасть по каталожному номеру или по названию.
                        <br>
                        Если вы зарегистрированны, как физическое лицо, то вам будут предоставлены цены для физических лиц.
                        Для того, чтобы стать нашим партнером, зарегистрируйте аккаунт юридического лица и прикрепите реквизиты вашей компании.
                        Подробнее смотрите в
                        <a href="{{ route('faq') }}">ответах на частые вопросы FAQ</a>
                        <br>
                        <br>
                        Если воникли проблемы при подборе запасных частей, свяжитесь с нашими сотрудником:
                        <br>
                        <a href="tel:+79267013882" style="margin-top: -10px">+79267013882</a> - Вадим
                        <br>
                        Если возникли проблемы при регистрации на сайте, свяжитесь с техническим специалистом:
                        <br>
                        <a href="tel:+79169174630" style="margin-top: -10px">+79169174630</a> - Наталья
                    </div>
                @endif
            </div>
            <div class="" style="font-size: 14px;padding: 15px;">
                @include('shop.seo-article')
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
    <h1 class="text-center" style="margin-bottom:30px;margin-top:30px">
        Автозапчасти по каталожному номеру
    </h1>
    @include('includes.shop.search')
    @if(!empty($search))
    @forelse($products as $product)
        @if($product->count > 0)
                <div class="card" style="width:18rem; margin-bottom:20px">
                    <div class="card-body">
                        <form action="{{ route('cart.store') }}" style="padding-bottom: 3px" method="POST">
                            @csrf

                            <h5 class="card-title">Каталожный номер: {{ $product->number }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted" style="white-space: pre-line">
                                {{ $product->brand }}, {{ $product->name }}
                            </h6>
                            <p class="card-text">Цена: {{ $product->price }} руб.</p>
                            <p class="card-text">Остаток на складе: {{ $product->count }} шт.</p>
                            <p class="card-text"> Срок доставки:
                                @if($product->warehouses) 
                                    @foreach($product->warehouses as $warehouse)
                                        @if($warehouse->own == 1)
                                            {{ date("d.m.y", strtotime($warehouse->shipmentDate)) }}
                                        @else
                                            Позиция отсутствует на нашем складе. Уточните время доставки у менеджера
                                        @endif
                                    @endforeach
                                @else
                                    {{ $product->shipmentDate }} дн.    
                                @endif
                            </p>

                            <div style="display: flex; justify-items: center">
                                <input type="hidden" name="goodsID" value="{{ $product->goodsID }}">
                                <input type="hidden" name="title" value="{{ $product->name }}">
                                <input type="hidden" name="price" value="{{ $product->price }}">
                                <input type="hidden" name="stock_quantity" value="{{ $product->count }}">
                                <input type="hidden" name="brand" value="{{ $product->brand }}">
                                <input type="hidden" name="code" value="{{ $product->number }}">
                                @if($product->warehouses)
                                    <input type="hidden" name="shipment_date" value="{{ $warehouse->shipmentDate }}">
                                @else
                                    <input type="hidden" name="shipment_date" value="{{ $product->shipmentDate }}">
                                @endif


                                @if($product->count > 0)
                                    <button type="submit" style="width: 100px; height: 36px" class="btn btn-secondary">
                                        <p class="text">
                                            В корзину
                                        </p>
                                    </button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
        @endif
    @empty
    <p class="text-center">
        Ничего не найдено по вашему запросу <strong>{{ request()->query('search') }}</strong>
    </p>
    @endforelse
    @else
    <div class="mt-20" style="font-size: 12px">
        Вы можете найти нужную автозапчасть по каталожному номеру или по названию.
        <br>
        Если вы зарегистрированны, как физическое лицо, то вам будут предоставлены цены для физических лиц.
        Для того, чтобы стать нашим партнером, зарегистрируйте аккаунт юридического лица и прикрепите реквизиты вашей компании.
        Подробнее смотрите в
        <a href="{{ route('faq') }}">ответах на частые вопросы FAQ</a>
        <br>
        <br>
        Если воникли проблемы при подборе запасных частей, свяжитесь с нашими сотрудником:
        <br>
        <a href="tel:+79267013882" style="margin-top: -10px">+79267013882</a> - Вадим
        <br>
        Если возникли проблемы при регистрации на сайте, свяжитесь с техническим специалистом:
        <br>
        <a href="tel:+79169174630" style="margin-top: -10px">+79169174630</a> - Наталья
    </div>
    @endif
    <div class="" style="font-size: 14px;padding: 15px;">
        @include('shop.seo-article')
    </div>
    <div class="leftColumn">
        @include('includes.shop.left-column')
    </div>
</div>
<style>
    input[type="number"]:invalid+span:after {
        content: '✖';
        padding-left: 5px;
        color: red;
    }

    input[type="number"]:valid+span:after {
        content: '✓';
        padding-left: 5px;
        color: green;
    }
</style>
@endsection('content')
