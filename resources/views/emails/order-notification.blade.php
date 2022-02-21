@component('mail::message')
<h3 class="text-center">На сайте Lemma-auto.ru размещен новый заказ.
<br>
<br>
Номер заказа: {{ $order->order_number }}
<br>
<br>
Итоговая стоимость: {{ $order->total }} руб.
<br>
<br>
@if($order->contact_id)
    Адрес пункта выдачи: {{ $order->contact->address }}
@else
    Адресс доставки: {{ $order->shipping_fullname }}, {{ $order->shipping_city }}, {{ $order->postcode }}, {{ $order->shipping_address }}, {{ $order->shipping_phone }}, {{ $order->notes }}
@endif
<br>
<br>
Оплата: {{ $order->payment->payment_method }}
</h3>
<br>
<br>
Новый заказ:

@component('mail::table')
| Каталожный номер  | Название          | Количество |
| ----------------- |:-----------------:| ----------:|
@foreach($order->products as $product)
| {{ $product->pivot->number }} | {{ $product->pivot->name }} | {{ $product->pivot->required_product_quantity }} |
@endforeach
@endcomponent

Не забудьте поменять статус заказа на "completed" в панеле администратора сайта,
как заказ быдет укомплектован и доставлен в выбранный офис
@component('mail::button', ['url' => 'http://lemma-auto.ru/login'])
Перейти на сайт
@endcomponent
@endcomponent
