@extends('layouts.site')
@section('title-block')Гарантии и возврат@endsection('title-block')
@section('description')<meta name="description" content="Интернет-магазин Лемма-авто осуществляет возврат и обмен неисправных запчастей в сжатые сроки. Вы можете ознакомится с условия обмена/возврата на нашем сайте, а также получить консультацию специалиста." />@endsection('description')
@section('content')
<div class="autoparts-big">
    <h1 style="text-align: center;margin-bottom:30px;margin-top:30px">
        Условия гарантии на запасные части
    </h1>
    <div class="row">
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
            <div class="leftColumn">
                @include('includes.shop.left-column')
            </div>
        </div>

        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
            <div style="font-size: 14px;padding: 20px;">
                @foreach ($laws as $law)
                    <a href="{{ route('law', $law->slug) }}">
                        <p style="color:black;font-size: 18px">
                            {{ $law->title}}
                        </p>
                    </a>
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
        Условия гарантии на запасные части
    </h1>
    @foreach ($laws as $law)
        <a href="{{ route('law', $law->slug) }}">
            <p style="color:black;font-weight: 600;font-size: 18px">
                {{ $law->title}}
            </p>
        </a>
    @endforeach
    <div class="leftColumn" style="margin-top:10px">
        @include('includes.shop.left-column')
    </div>
</div>
@endsection('content')
