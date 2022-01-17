@extends('layouts.site')
@section('title-block')Магазин автозапчастей@endsection('title-block')
@section('description')<meta name="description" content="В интернет-магазине Лемма-авто вы можете купить автозапчасти по доступной цене. Широкий ассортимент запчастей и расходных материалов. Консультация специалиста. Пункты самовывоза в Москве." />@endsection('description')
@section('content')
<div class="autoparts-big">
        <div class="row">
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                <div class="leftColumn">
                    @include('includes.shop.left-column')
                </div>
            </div>

            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                <h1 class="text-center">Поиск автозапчастей</h1>
                <div class="card shadow bg-body rounded" style="font-size: 14px;padding: 15px;">
                    @include('includes.shop.search')
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
                                                @foreach($product->warehouses as $warehouse)
                                                    @if($warehouse->id !== 'F453103A-DA12-11E9-A2F0-005056802F4C')
                                                        {{ date("d.m.y", strtotime($warehouse->shipmentDate)) }}
                                                    @else
                                                        {{ date("d.m.y", strtotime($warehouse->shipmentDate)) }}
                                                    @endif
                                                    @break
                                                @endforeach
                                            </td>

                                            <td style="display: flex; justify-items: center">
                                                <input type="hidden" name="goodsID" value="{{ $product->goodsID }}">
                                                <input type="hidden" name="title" value="{{ $product->name }}">
                                                <input type="hidden" name="price" value="{{ $product->price }}">
                                                <input type="hidden" name="stock_quantity" value="{{ $product->count }}">
                                                <input type="hidden" name="brand" value="{{ $product->brand }}">
                                                <input type="hidden" name="code" value="{{ $product->number }}">
                                                <input type="hidden" name="shipment_date" value="{{ $warehouse->shipmentDate }}">

                                                <button type="submit" style="width: 100px; height: 36px" class="btn btn-secondary">
                                                    <p class="text" id="demo">
                                                        В корзину
                                                    </p>
                                                </button>
                                            </td>
                                        </form>
                                    </tr>
                                    </tbody>
                                @endif
                            @empty
                                <p class="text-center">
                                    Ничего не найдено по вашему запросу <strong>{{ request()->query('search') }}</strong>
                                </p>
                            @endforelse
                        </table>
                    @else
                        <div class="mt-20">
                            Вы можете найти нужную автозапчасть по каталожному номеру или по названию.
                            <br>
                            Или свяжитесь с нашим менеджером для помощи в подборе запасной части
                            <br>
                            <a href="tel:+79267013882" style="margin-top: -10px">+79267013882</a> - Вадим
                        </div>
                    @endif
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
        <h1 class="text-center">Поиск автозапчастей</h1>
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
                                <p class="card-text"> Срок жоставки:
                                    @foreach($product->warehouses as $warehouse)
                                        @if($warehouse->own == 1)
                                            {{ date("d.m.y", strtotime($warehouse->shipmentDate)) }}
                                        @else
                                            Позиция отсутствует на нашем складе. Уточните время доставки у менеджера
                                        @endif
                                    @endforeach
                                </p>

                                <div style="display: flex; justify-items: center">
                                    <input type="hidden" name="goodsID" value="{{ $product->goodsID }}">
                                    <input type="hidden" name="title" value="{{ $product->name }}">
                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                    <input type="hidden" name="stock_quantity" value="{{ $product->count }}">
                                    <input type="hidden" name="brand" value="{{ $product->brand }}">
                                    <input type="hidden" name="code" value="{{ $product->number }}">

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
        <div class="mt-20">
            Вы можете найти нужную автозапчасть по каталожному номеру или по названию.
            <br>
            Или свяжитесь с нашим менеджером для помощи в подборе запасной части
            <br>
            <a href="tel:+79267013882" style="margin-top: -10px">+79267013882</a> - Вадим
        </div>
        @endif
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
