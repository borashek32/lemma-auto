@extends('layouts.site')
@section('title-block')Ответы на частые вопросы FAQ @endsection('title-block')
@section('description')<meta name="description" content="Правила использования сайта компании ООО Лемма-авто" />@endsection('description')
@section('content')
<div class="autoparts-big">
    <div class="row">
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
            <div class="leftColumn">
                @include('includes.shop.left-column')
            </div>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
            <p style="margin-left:20px;margin-top:10px; margin-bottom:0px;margin-right: 0px;text-align:left; font-size: 20px">
                {!! $faq->question !!}
            </p>
            <p>
                {!! $faq->answer !!}
            </p>
        </div>        
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
            <div class="advertisements">
                <livewire:user.advertisements.advertisements />
            </div>
        </div>
    </div>
</div>

<div class="autoparts-small p-8">
    <div class="col-md-12 col-sm-12 col-12">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <p style="margin-left:0px;margin-top:10px; margin-bottom:0px;margin-right: 0px;text-align:left; font-size: 20px">
                    {!! $faq->question !!}
                </p>
                <p>
                    {!! $faq->answer !!}
                </p>
            </div>
        </div>
    </div>
    <div class="leftColumn">
        @include('includes.shop.left-column')
    </div>
</div>

@endsection('content')

