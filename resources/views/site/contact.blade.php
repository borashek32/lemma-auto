@extends('layouts.site')

@section('title-block')Контакты@endsection('title-block')

@section('content')
    <h1>Напишите нам</h1>
    <div class="site-contact contact">
        <div class="row">
            <div class="col-lg-6">
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
                        <label class="p-1" for="subject">Вид работ:</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                               name="subject" value="{{ old('subject') }}" minlength="5" required autocomplete="subject">
                    </div>
                    <div class="form-group">
                        <label class="p-1" for="message">Сообщение:</label>
                        <textarea name="message" rows="7" id="message" class="form-control"
                                  placeholder="Введите ваше сообщение" required minlength="10"></textarea>
                    </div>
                    <p><button type="submit" class="btn btn-md btn-success">Отправить</button></p>
                </form>
            </div>
            <div class="col-lg-6 col-xl-6 col-md-6">
                <livewire:user.contacts />
            </div>
        </div>
    </div>
    <script>
        $('#myForm').validate();
    </script>
@endsection('content')
