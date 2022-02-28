@extends('layouts.site')
@section('title-block')Контакты@endsection('title-block')
@section('description')<meta name="description" content="Интернет-магазин Лемма-авто располагает тремя офисами: в центре Москвы, в поселке Коммунарка, в деревне Ватутинки. Вы всегда можете договорится о самовывозе вашего заказа на любое удобное для вас время." />@endsection('description')
@section('content')
<div class="autoparts-big">
    <h1 class="text-center" style="margin-bottom:30px;margin-top:30px">
        Наши офисы:
    </h1>
    <div class="row">
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
            <div class="leftColumn">
                @include('includes.shop.left-column')
            </div>
        </div>    
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
            <div style="font-size: 14px;padding: 15px;">
                <livewire:user.contacts />
            </div>
            
            <h3 class="text-center">Напишите нам</h3>
            <div class="card shadow bg-body rounded" style="font-size: 14px;padding: 15px;margin-top: 20px">
                <form action="{{ route('contact-form') }}" method="post" id="myForm" data-ajax-form>
                    @csrf
                    @include('includes.messages_success')
                    <div class="form-group">
                        <label class="p-1" for="name">Имя:</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ old('name') }}" required autocomplete="name" minlength="2" autofocus>
                    </div>
                    <div class="form-group">
                        <label class="p-1" for="email">Email:</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email">
                    </div>
                    <div class="form-group">
                        <label class="p-1" for="message">Сообщение:</label>
                        <textarea name="message" rows="7" id="message" class="form-control"
                                  placeholder="" required minlength="10"></textarea>
                    </div>
                    <p><button type="submit" class="btn btn-md btn-success">Отправить</button></p>
                </form>
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
        Наши офисы:
    </h1>
    <livewire:user.contacts />
    <h2>Напишите нам</h2>
    <form action="{{ route('contact-form') }}" method="post" id="myForm" data-ajax-form>
        @csrf
        @include('includes.messages_success')
        <div class="form-group">
            <label class="p-1" for="name">Имя:</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                   name="name" value="{{ old('name') }}" required autocomplete="name" minlength="2" autofocus>
        </div>
        <div class="form-group">
            <label class="p-1" for="email">Email:</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                   name="email" value="{{ old('email') }}" required autocomplete="email">
        </div>
        <div class="form-group">
            <label class="p-1" for="message">Сообщение:</label>
            <textarea name="message" rows="7" id="message" class="form-control"
                      placeholder="" required minlength="10"></textarea>
        </div>
        <p><button type="submit" class="btn btn-md btn-success">Отправить</button></p>
    </form>
    
    <div class="leftColumn">
        @include('includes.shop.left-column')
    </div>
</div>    
    
    <script>
        $('#myForm').validate();
    </script>
@endsection('content')
