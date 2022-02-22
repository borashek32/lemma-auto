@component('mail::message')<h3 class="text-center">
        {{ $post->title }}
        <br>
        Категория: {{ $post->category->name }}
    </h3>
    <br>
    <img src="{{ $post->img }}" alt="{{ $post->title }}">

    {!! $post->page_text !!}

    Для того, чтобы отписаться от рассылки, перейдите в личный кабинет на сайте
@component('mail::button', ['url' => 'http://lemma-auto.ru/login'])
    Перейти на сайт
@endcomponent
@endcomponent
