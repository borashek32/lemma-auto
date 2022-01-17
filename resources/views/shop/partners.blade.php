@extends('layouts.site')
@section('title-block')Наши партнеры@endsection('title-block')
@section('description')<meta name="description" content="В нашем магазине вы можете приобрести запасные части на ваш автомобиль от ведущих поставщиков запасных частей в России по доступным ценам. Ознакомиться со списком наших партнеров вы можете на нашем сайте." />@endsection('description')
@section('content')
<div class="autoparts-big">
    <div class="row">
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
            <div class="leftColumn">
                @include('includes.shop.left-column')
            </div>
        </div>

        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
            <h2 class="text-center">Наши партнеры:</h2>
            
        
                <div class="card shadow bg-body rounded" style="font-size: 14px;padding: 15px;">
                    <div class="row">
                        @foreach($advertisements as $advertisement)
                        <div class="col-xl-3  col-lg-3  col-md-4  col-6">
                            <div class="wrapCard">
                                    <a href="http://{{ $advertisement->link }}">
                                        <img src="{{ $advertisement->banner }}"
                                             style="height:auto;background-size:cover;margin-bottom: 10px" width="130px"
                                             alt="{{ $advertisement->link }}" />
                                    </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                
            
        </div>

        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
            <div class="advertisements">
                <livewire:user.advertisements.advertisements />
            </div>
        </div>
    </div>
</div>

<div class="autoparts-small">
    <h2 class="text-center">Наши партнеры:</h2>
        <div class="card shadow bg-body rounded" style="font-size: 14px;padding: 15px;">
            <div class="row">
                @foreach($advertisements as $advertisement)
                <div class="col-xl-3  col-lg-3  col-md-4  col-6">
                    <div class="wrapCard">
                        <a href="http://{{ $advertisement->link }}">
                            <img src="{{ $advertisement->banner }}"
                                 style="height:auto;background-size:cover;margin-bottom: 10px" width="130px"
                                 alt="{{ $advertisement->link }}" />
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="leftColumn">
            @include('includes.shop.left-column')
        </div>
    </div>
</div>
@endsection('content')

