@component('mail::message')
<h3 class="text-center">Ваш заказ успешно размещен. Наш менеджер свяжется с вами в
ближайшее время для подтверждения наличия запасных частей у поставщика
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
Способ оплаты: {{ $order->payment->payment_method }}
</h3>
<br>
<br>
Ваш заказ:

@component('mail::table')
| Каталожный номер  | Название          | Количество |
| ----------------- |:-----------------:| ----------:|
@foreach($order->products as $product)
| {{ $product->pivot->number }} | {{ $product->pivot->name }} | {{ $product->pivot->required_product_quantity }} |
@endforeach
@endcomponent

Мы пришлем уведомление вам на почту, как ваш заказ будет укомплектован.
Также вы можете узнать статус заказа в личном кабинте. Перейдите на сайт:
@component('mail::button', ['url' => 'http://lemma-auto.ru/login'])
Перейти на сайт
@endcomponent
@endcomponent
