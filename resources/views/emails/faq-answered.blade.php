@component('mail::message')
Готов ответ на ваш вопрос "{{ $faq->question }}" на сайте <a href="lemma-auto.ru">Lemma-auto.ru</a>.
<br>
Для ознакомления перейдите по ссылке:
<a href="lemma-auto.ru/faq/{{ $faq->slug }}">lemma-auto.ru/faq/{{ $faq->slug }}</a>

Для того, чтобы отписаться от рассылки, перейдите в личный кабинет на сайте
@component('mail::button', ['url' => 'http://lemma-auto.ru/login'])
Перейти на сайт
@endcomponent
@endcomponent
