@extends('layouts.auto-parts')
@section('title-block')Магазин автозапчастей@endsection('title-block')
@section('content')
<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
    <h5 class="mb-2">Поиск автозапчастей</h5>
    <form method="get" action="{{ route('auto-parts') }}" class="input-group mb-4">
        <input type="text" class="form-control shadow p-3 bg-body rounded"
               style="margin-bottom:0px;margin-right: 10px" placeholder="Введите каталожный номер или название"
               aria-label="Username" id="search" name="search" aria-describedby="basic-addon1">
        <button type="submit" class="btn btn-secondary" style="height: 40px">
            Поиск
        </button>
    </form>
    <a href="{{ route('auto-parts') }}">
        <button class="btn btn-secondary" style="margin-top: -10px;margin-bottom: 10px">
            Сбросить
        </button>
    </a>
    @if(!empty($search))
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Номер</th>
                <th scope="col">Название</th>
                <th scope="col">Цена</th>
                <th scope="col">Количество</th>
                <th scope="col">Заказать</th>
            </tr>
            </thead>
            @forelse($autoparts as $autopart)
                <tbody>
                <tr>
                    <form method="get" action="#">
                        <td>{{ $autopart->code }}</td>
                        <td>{{ $autopart->title }}</td>
                        <td>{{ $autopart->price }}</td>
                        <td>
                            <input type="text" class="form-control p-3 bg-body rounded"
                                   style="margin-bottom:0px;margin-right:10px" width="10px" placeholder="Кол-во"
                                   aria-label="qnt" id="qnt" name="qnt" aria-describedby="basic-addon1">
                        </td>
                        <td>
                            <button type="submit" class="btn btn-secondary" style="height: 35px;padding-bottom: 3px">
                                <p>В корзину</p>
                            </button>
                        </td>
                    </form>
                </tr>
                </tbody>
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
            <a href="tel:+79999999999" style="margin-top: -10px">+7 999 9999999</a> - Вадим
        </div>
    @endif
</div>
@endsection('content')
