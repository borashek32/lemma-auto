@component('mail::message')
<h3 class="text-center">
Получено новое сообщение на сайте Lemma-auto.ru
</h3>
<br>
<br>
<p>Имя: {{ $data['name'] }}</p>
<p>Электронная почта: {{ $data['email'] }}</p>
<p>Сообщение: {{ $data['message'] }}</p>

@component('mail::button', ['url' => 'http://lemma-auto.ru/'])
Перейти на сайт
@endcomponent
@endcomponent

