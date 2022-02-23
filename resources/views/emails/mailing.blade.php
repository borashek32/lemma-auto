@component('mail::message')
В категории {{ $post->category->name }} на сайте <a href="lemma-auto.ru">Lemma-auto.ru</a> опубликован новый пост:

<a href="lemma-auto.ru/blog/{{ $post->slug }}">{{ $post->title }}</a>

Для того, чтобы отписаться от рассылки, перейдите в личный кабинет на сайте
@component('mail::button', ['url' => 'http://lemma-auto.ru/login'])
Перейти на сайт
@endcomponent
@endcomponent
