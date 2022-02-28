@extends('layouts.site')
@section('title-block')Магазин автозапчастей@endsection('title-block')
@section('content')
    <div class="autoparts-big">
        <h1 style="text-align: center;margin-bottom:30px;margin-top:30px">
            Оплата запасных частей:
        </h1>
        <div class="row">
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                <div class="leftColumn">
                    @include('includes.shop.left-column')
                </div>
            </div>

            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                <div style="padding: 15px;">
                    @foreach ($payments as $payment)
                        <ul>
                            <li>
                                <p style="font-size: 16px">{!! $payment->payment_method !!}</p>
                            </li>
                        </ul>
                        <p style="font-size: 14px">{!! $payment->description !!}</p>
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
        <h1 style="text-align: center;margin-bottom:30px;margin-top:30px">
            Оплата запасных частей:
        </h1>
        <div style="padding: 15px;">
            @foreach ($payments as $payment)
                <p style="font-size: 16px">{!! $payment->payment_method !!}</p>
                <ul>
                    <li>
                        <p style="font-size: 16px">{!! $payment->payment_method !!}</p>
                    </li>
                </ul>
            @endforeach
        </div>
        <div class="leftColumn">
            @include('includes.shop.left-column')
        </div>
    </div>
@endsection('content')
