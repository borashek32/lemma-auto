@extends('layouts.site')

@section('title-block')Отзывы@endsection('title-block')

@section('content')
    <h1>Оставьте свой отзыв</h1>
    <div class="site-contact contact">
        <div class="row">
            <div class="col-lg-6">
                <form action="{{ route('reviews-form') }}" method="post">
                    @csrf
                    @include('includes.messages_success')
                    <div class="form-group">
                        <label class="p-1" for="name">Имя:</label>
                        <input type="text" name="name" minlength="3" required class="form-control" placeholder="Введите ваше имя" id="name">
                    </div>
                    <div class="form-group">
                        <label class="p-1" for="message">Сообщение:</label>
                        <textarea name="review" required minlength="10" rows="7" id="review" class="form-control" placeholder="Введите ваше сообщение"></textarea>
                    </div>
                    <p><button type="submit" class="btn btn-md btn-success">Отправить</button></p>
                </form>
            </div>
            <contact-component :urldata="{{ json_encode($reviews) }}"></contact-component>
            <div class="col-lg-6 col-xl-6 col-md-6">
                @foreach($reviews as $review)
                    <div class="alert alert-info">
                        <h6>{{ $review->name }}</h6>
                        <h7>{{ $review->created_at }}</h7>
                        <pre>{{ $review->review }}</pre>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection('content')

