@component('mail::message')
<h3 class="text-center">
Заказ обратного звонка на сайте Lemma-auto.ru
</h3>
<br>
<br>
<p>Имя: {{ $request['name'] }}</p>
<p>Телефон: {{ $request['phone'] }}</p>

@component('mail::button', ['url' => 'http://lemma-auto.ru/'])
Перейти на сайт
@endcomponent
@endcomponent

