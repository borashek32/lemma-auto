@section('title-block')Заказ@endsection('title-block')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Детали заказа') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <h2 class="mb-2">Заказ № {{ $order->order_number }} </h2>

                <a href="{{ route('auto-parts') }}">
                    <p class="underline">В магазин</p>
                </a>

                <br>

                <table class="table-fixed w-full table-order">
                    <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Стоимость</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Статус</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Оплата</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Адрес доставки</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Позиции</th>
                    </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $order->total }} руб.</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">{{ $order->status }}</td>
                            <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5" style="white-space: normal">{{ $order->payment->payment_method }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5" style="white-space: normal">
                                @if($order->contact_id) 
                                    {{ $order->contact->address }}
                                @else
                                    <p>{{ $order->shipping_fullname }}</p>
                                    <p>{{ $order->shipping_city }}</p>
                                    <p>{{ $order->shipping_postcode }}</p>
                                    <p>{{ $order->shipping_address }}</p>
                                    <p>{{ $order->shipping_phone }}</p>
                                @endif    
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5" style="white-space: normal">
                                @foreach($order->products as $product)
                                    <p>№ {{ $product->code }} - {{ $product->title }} - {{ $product->pivot->required_product_quantity }} шт. - {{ number_format($product->price, 2) }} руб. - Срок доставки: {{ date("d.m.y", strtotime($product->pivot->shipment_date)) }}</p>
                                    <br>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <div class="flex flex-cols-2 items-center card-order">
                    <div class="bg-white shadow-xl rounded-lg overflow-hidden border-gray-200 m-4">
                        <div class="p-4">
                            <p class="text-lg text-gray-900">
                                Стоимость • {{ $order->total }} руб.
                            </p>
                        </div>
                        <div class="p-4">
                            <p class="uppercase tracking-wide text-sm font-bold text-gray-700">
                                Статус заказа • {{ $order->status }}
                            </p>
                        </div>
                        <div class="p-4">
                            <p class="text-lg text-gray-900">
                                Метод оплаты • {{ $order->payment->payment_method }}
                            </p>
                        </div>
                        <div class="p-4">
                            <p class="uppercase tracking-wide text-sm font-bold text-gray-700">
                                Адрес доставки •
                                @if($order->contact_id) 
                                    {{ $order->contact->address }}
                                @else
                                    <p>{{ $order->shipping_fullname }}</p>
                                    <p>{{ $order->shipping_city }}</p>
                                    <p>{{ $order->shipping_postcode }}</p>
                                    <p>{{ $order->shipping_address }}</p>
                                    <p>{{ $order->shipping_phone }}</p>
                                @endif  
                            </p>
                        </div>
                        <div class="p-4">
                            <p class="uppercase tracking-wide text-sm font-bold text-gray-700">
                                Позиции •
                                @if($order->contact_id) 
                                    {{ $order->contact->address }}
                                @else
                                    @foreach($order->products as $product)
                                    <p>№ {{ $product->code }} - {{ $product->title }} - {{ $product->pivot->required_product_quantity }} шт. * {{ number_format($product->price, 2) }} руб.</p>
                                    <br>
                                @endforeach
                                @endif  
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

