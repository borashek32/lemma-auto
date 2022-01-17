@extends('layouts.site')
@section('title-block')Наши реквизиты@endsection('title-block')
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
            <h2 style="text-align: center;margin-bottom: 16px;">
                Наши реквизиты
            </h2>
            <div class="card shadow bg-body rounded" style="padding: 15px;">
                    @foreach($requisites as $requisite)
                        <li class="list-group-item" style="font-size:14px;text-align:left;padding:3px;">
                            <strong>Название организации:</strong> {{ $requisite->title }}
                        </li>
                        <li class="list-group-item" style="font-size:14px;text-align:left;padding:3px;">
                            <strong>Юридический адрес:</strong> {{ $requisite->legal_address }}
                        </li>
                        <li class="list-group-item" style="font-size:14px;text-align:left;padding:3px;">
                            <strong>Реальный адрес:</strong> {{ $requisite->real_address }}
                        </li>
                        <li class="list-group-item" style="font-size:14px;text-align:left;padding:3px;">
                            <strong>ИНН/КПП:</strong> {{ $requisite->inn_kpp }}
                        </li>
                        <li class="list-group-item" style="font-size:14px;text-align:left;padding:3px;">
                            <strong>Расчетный счет:</strong> {{ $requisite->r_s }}
                        </li>
                        <li class="list-group-item" style="font-size:14px;text-align:left;padding:3px;">
                            <strong>Корреспондентский счет</strong> {{ $requisite->k_s }}
                        </li>
                        <li class="list-group-item" style="font-size:14px;text-align:left;padding:3px;">
                            <strong>БИК:</strong> {{ $requisite->bik }}
                        </li>
                    @endforeach

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
    <h2 style="text-align: center;margin-bottom: 16px;">
        Наши реквизиты
    </h2>
    <div class="card shadow bg-body rounded" style="font-size: 14px;padding: 15px;margin: 15px">
            @foreach($requisites as $requisite)
                <li class="list-group-item" style="font-size:14px;text-align:left;padding:3px;">
                    <strong>Название организации:</strong> {{ $requisite->title }}
                </li>
                <li class="list-group-item" style="font-size:14px;text-align:left;padding:3px;">
                    <strong>Юридический адрес:</strong> {{ $requisite->legal_address }}
                </li>
                <li class="list-group-item" style="font-size:14px;text-align:left;padding:3px;">
                    <strong>Реальный адрес:</strong> {{ $requisite->real_address }}
                </li>
                <li class="list-group-item" style="font-size:14px;text-align:left;padding:3px;">
                    <strong>ИНН/КПП:</strong> {{ $requisite->inn_kpp }}
                </li>
                <li class="list-group-item" style="font-size:14px;text-align:left;padding:3px;">
                    <strong>Расчетный счет:</strong> {{ $requisite->r_s }}
                </li>
                <li class="list-group-item" style="font-size:14px;text-align:left;padding:3px;">
                    <strong>Корреспондентский счет</strong> {{ $requisite->k_s }}
                </li>
                <li class="list-group-item" style="font-size:14px;text-align:left;padding:3px;">
                    <strong>БИК:</strong> {{ $requisite->bik }}
                </li>
            @endforeach
    </div>
    <div class="leftColumn">
        @include('includes.shop.left-column')
    </div>
</div>
@endsection('content')
