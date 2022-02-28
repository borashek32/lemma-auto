@extends('layouts.site')

@section('title-block')Магазин автозапчастей@endsection('title-block')

@section('content')
    <div class="autoparts-big">
        <h1 style="text-align: center;margin-bottom:30px;margin-top:30px">
            Доставка запасных частей:
        </h1>
        <div class="row">
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                <div class="leftColumn">
                    @include('includes.shop.left-column')
                </div>
            </div>

            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                <div style="font-size: 14px;padding: 15px;">
                    <ul style="font-size: 16px;margin-left:20px;">
                        @foreach ($deliveries as $delivery)
                            <li>
                                {{ $delivery->title }}
                            </li>
                            <p>
                                {!! $delivery->description !!}
                            </p>
                        @endforeach
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
        <h1 style="text-align: center;margin-bottom:30px;margin-top:30px">
            Доставка запасных частей:
        </h1>
        <div style="font-size: 14px;padding: 15px;">
            <ul style="font-size: 16px;margin-left:20px;">
                @foreach ($deliveries as $delivery)
                    <li>
                        {{ $delivery->title }}
                    </li>
                    <p>
                        {{ $delivery->description }}
                    </p>
                @endforeach
            </ul>
        </div>
        <div class="leftColumn">
            @include('includes.shop.left-column')
        </div>
    </div>
@endsection('content')
