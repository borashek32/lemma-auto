@section('title-block')Заказы@endsection('title-block')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ваши заказы') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                @if(Auth::user()->orders->count() > 0)
                    <h2 class="mb-2">Всего заказов: {{ Auth::user()->orders->count() }} </h2>

                    <a href="{{ route('auto-parts') }}">
                        <p class="underline">В магазин</p>
                    </a>

                    <br>

                    <table class="table-fixed w-full table-orders">
                        <thead>
                        <tr class="bg-gray-100">
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10 iteration">№</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Номер заказа</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Стоимость</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Статус</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Детали</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach(Auth::user()->orders as $order)
                                <tr>
                                    <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5 iteration">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $order->order_number }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">{{ $order->total }} руб.</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">{{ $order->status }}</td>
                                    <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">
                                        <div class="">
                                            <a href="{{ route('order.details', $order->id) }}">
                                                <button class="mb-2 bg-blue-500 mr-2 hover:bg-blue-700 text-white font-bold py-2
                                                px-4 rounded">
                                                    Подробнее
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <div class="flex flex-cols-2 items-center card-orders">
                            @foreach(Auth::user()->orders as $order)
                                <div class="bg-white shadow-xl rounded-lg border-gray-200 m-4">
                                    <div class="p-4">
                                        <p class="uppercase tracking-wide text-sm font-bold text-gray-700">
                                            Номер заказа • {{ $order->order_number }}
                                        </p>
                                        <p class="text-lg text-gray-900">
                                            Стоимость • {{ $order->total }} руб.
                                        </p>
                                    </div>
                                    <div class="p-4">
                                        <p class="uppercase tracking-wide text-sm font-bold text-gray-700">
                                            Статус заказа • {{ $order->status }}
                                        </p>
                                    </div>
                                    <div class="px-4 pt-3 pb-4 border-t border-gray-300 bg-gray-100">
                                        <div class="flex items-center pt-2">
                                            <div class="">
                                                <a href="{{ route('order.details', $order->id) }}">
                                                    <button class="mb-2 bg-blue-500 mr-2 hover:bg-blue-700 text-white font-bold py-2
                                                    px-4 rounded">
                                                        Подробнее
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    </div>
                @else
                    <div class="text-lg">
                        У вас пока нет заказов
                    </div>
                    <a href="{{ route('auto-parts') }}">
                        В магазин
                    </a>
                @endif
            </div>
        </div>
    </div>
    <style>
            .card-orders {
                 display: none;
            }
            @media (max-width: 782px) {
                .card-orders {
                    display: block;
                }
                .table-orders {
                    display: none;
                }
            }
        </style>
</x-app-layout>

