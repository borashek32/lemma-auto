@component('mail::message')
    <h3 class="text-center">
        {{ $faq->question }}
    </h3>
    <br>
    {!! $faq->answer !!}

    Для того, чтобы отписаться от рассылки, перейдите в личный кабинет на сайте
@component('mail::button', ['url' => 'http://lemma-auto.ru/login'])
    Перейти на сайт
@endcomponent
@endcomponent
