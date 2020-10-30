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
                <p class="text">108814, город Москва, поселение Сосенское,<br>
                    поселок Коммунарка, Бачуринская улица,<br>
                    дом 317Ю, офис 5а, <a href="tel:+79267013882" class="textAddress">+7 926 701 3882</a></p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d72159.
                36227152712!2d37.290968757666185!3d55.584954912392895!2m3!1f0!2f0!3f0!3m2
                !1i1024!2i768!4f13.1!3m3!1m2!1s0x46b553bd00000001%3A0x2ebc8c7f52a1e330!2z0
                JjQvdGC0LXRgNGC0YDQsNC90YHRgdC10YDQstC40YEsINC-0YTQuNGG0LjQsNC70YzQvdGL0Lkg
                0LTQuNC70LXRgCBNQU4!5e0!3m2!1sen!2sru!4v1591813209576!5m2!1sen!2sru"
                        width="500" height="500" frameborder="0" style="border:0;" allowfullscreen=""
                        aria-hidden="false"
                        tabindex="0">
                </iframe>
            </div>
        </div>
    </div>
    <script>
        $('#myForm').validate();
    </script>
@endsection('content')
