@extends('layouts.site')
@section('title-block')О нас@endsection('title-block')
@section('description')<meta name="description" content="В интернет-магазине Лемма-авто работают только профессионалы. У нас вы можете получить бесплатную консультацию по подбору запасных частей на ваш автомобиль по VIN-номеру или оставить заявку нашему менеджеру." />@endsection('description')
@section('content')
<div class="autoparts-big">
    <div class="row">
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
            <div class="leftColumn">
                @include('includes.shop.left-column')
            </div>
        </div>

        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
            <div class="card shadow bg-body rounded" style="font-size: 14px;padding: 15px;">
                <h2 style="text-align: center;margin-bottom: 16px;">
                    Наша команда
                </h2>

                <div class="row">
                    @foreach($members as $member)
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                            <div class="card mb-4 shadow">
                                <ul class="list-group list-group-flush">
                                    <li style="text-align: center" class="list-group-item">
                                        {{ $member->name }}
                                    </li>

                                    <li class="list-group-item" style="display:flex;justify-content: center;align-items:
                                    center;padding: 10px;overflow: hidden; ">
                                        <img src="{{ $member->photo }}" style="height: 100px; background-size: cover"
                                             alt="{{ $member->name }}" />
                                    </li>

                                    <li class="list-group-item" style="font-size:16px;text-align:center;padding:3px;">
                                        <a href="tel:{{ $member->phone }}">
                                            {{ $member->phone }}
                                        </a>
                                    </li>

                                    <li class="list-group-item" style="font-size:16px;text-align:center;padding:3px;">
                                        {{ $member->position }}
                                    </li>

                                    <li class="list-group-item" style="font-size:14px;text-align:center;padding:3px;">
                                        {!! $member->description !!}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>    
        </div>
        
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
            <livewire:user.advertisements.advertisements />
        </div>
    </div>
</div>

<div class="autoparts-small p-8">
    <h2 style="text-align: center;margin-bottom: 16px;">
        Наша команда
    </h2>

    <div class="row">
        @foreach($members as $member)
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                <div class="card mb-4 shadow">
                    <ul class="list-group list-group-flush">
                        <li style="text-align: center" class="list-group-item">
                            {{ $member->name }}
                        </li>

                        <li class="list-group-item" style="display:flex;justify-content: center;align-items:
                        center;padding: 10px;overflow: hidden; ">
                            <img src="{{ $member->photo }}" style="height: 100px; background-size: cover"
                                 alt="{{ $member->name }}" />
                        </li>

                        <li class="list-group-item" style="font-size:16px;text-align:center;padding:3px;">
                            <a href="tel:{{ $member->phone }}">
                                {{ $member->phone }}
                            </a>
                        </li>

                        <li class="list-group-item" style="font-size:16px;text-align:center;padding:3px;">
                            {{ $member->position }}
                        </li>

                        <li class="list-group-item" style="font-size:14px;text-align:center;padding:3px;">
                            {!! $member->description !!}
                        </li>
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
    <div class="leftColumn">
        @include('includes.shop.left-column')
    </div>
</div>
@endsection('content')
