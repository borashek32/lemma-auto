@extends('layouts.layoutControllers')
@section('content')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Управление заказами
            </h2>
        </div>
    </header>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('success'))
                <div class="bg-teal-100 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <div class="flex justify-between">
                    <div class="text-left">
                        <h2 class="mb-10 font-semibold text-xl text-gray-800 leading-tight">
                            @if(\App\Models\Order::count() > 0)
                                Всего заказов: {{ \App\Models\Order::count() }}
                            @endif
                            <br>
                            @if(\App\Models\Order::where('status', 'выполнен')->count() > 0)
                                Выполнено заказов: {{ \App\Models\Order::where('status', 'выполнен')->count() }}
                            @endif
                        </h2>
                    </div>
                    <div class="text-center">
                        <form method="get" action="{{ route('admin-orders.index') }}" class="input-group mb-3">
                            <div class="flex">
                                <input type="text" class="shadow appearance-none border rounded w-100 py-2 px-3 text-gray-700
                                leading-tight focus:outline-none focus:shadow-outline mr-4 "
                                       placeholder="Поиск" aria-label="Username" id="search" name="search"
                                       aria-describedby="basic-addon1">

                                <button type="submit" class="shadow appearance-none border ml-2 rounded w-20 h-9 text-center py-2 px-3 text-gray-700
                                leading-tight focus:outline-none focus:shadow-outline bg-blue-200">
                                    Поиск
                                </button>

                                <a href="{{ route('orders.index') }}">
                                    <button type="submit" class="ml-4 shadow appearance-none border rounded w-20 h-9 text-center py-2 px-3 text-gray-700
                                leading-tight focus:outline-none focus:shadow-outline bg-red-200">
                                        Сброс
                                    </button>
                                </a>
                            </div>
                            @error('search')<span class="text-red-500">{{ $message }}</span>@enderror
                        </form>
                    </div>
                </div>
                @if(\App\Models\Order::all()->count() > 0)
                    <table class="table-fixed w-full">
                        <thead>
                        <tr class="bg-gray-100">
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">№</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">№ заказа</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Товары в закезе</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">ФИО клиента</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Стоимость</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Статус</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Действие</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">{{ $order->order_number }}</td>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">
                                    @foreach($order->products as $product)
                                        <wbr>{{ $product->pivot->number }}</wbr><br>
                                        <wbr>{{ $product->pivot->name }}</wbr><br>
                                        <wbr>Количество: {{ $product->pivot->required_product_quantity }}</wbr><br> 
                                        <wbr>Срок доставки: {{ date("d.m.y", strtotime($product->pivot->shipment_date)) }}</wbr><br><br>
                                    @endforeach
                                </td>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $order->user->name }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">{{ $order->total }} руб.</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">
                                    <!-- This is an example component -->
                                    <label class="flex items-center">
                                        <input class="relative w-10 h-5 transition-all duration-200 ease-in-out bg-gray-400 cursor-pointer rounded-full shadow-inner outline-none appearance-none"
                                               type="checkbox" data-on="Completed" data-off="Processing" data-toggle="toggle"
                                               {{ $order->status=='выполнен' ? 'checked' : '' }} name="status" value="{{ $order->id }}"/>
                                    </label>
                                </td>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">
                                    <div class="">
                                    <!--<a href="{{ route('admin-orders.edit', $order->id) }}">-->
                                        <!--    <button class="mb-2 bg-blue-500 mr-2 hover:bg-blue-700 text-white font-bold py-2-->
                                        <!--        px-4 rounded">-->
                                        <!--        Редактировать-->
                                        <!--    </button>-->
                                        <!--</a>-->
                                        <!--<br>-->

                                        <form action="{{ route('admin-orders.destroy', $order['id']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Удалить" class="bg-red-500 hover:bg-red-700
                                            text-white font-bold py-2 px-4 rounded">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>На вашем сайте пока нет заказов</p>
                @endif
                <div class="mt-4">
                    {{ $orders->links('vendor.pagination.simple-tailwind') }}
                </div>
            </div>
        </div>
    </div>

    <style>
        input:before {
            content: '';
            position: absolute;
            width: 1.25rem;
            height: 1.25rem;
            border-radius: 50%;
            top: 0;
            left: 0;
            transform: scale(1.1);
            box-shadow: 0 0.125rem 0.5rem rgba(0, 0, 0, 0.2);
            background-color: white;
            transition: .2s ease-in-out;
        }

        input:checked {
            @apply: bg-indigo-400;
            background-color:#7f9cf5;
        }

        input:checked:before {
            left: 1.25rem;
        }
    </style>
@endsection('content')

@section('scripts')
    <script>
        $('input[name=status]').change(function () {
            var mode=$(this).prop('checked');
            var id=$(this).val();
            $.ajax({
                url: "{{ route('admin-orders.status') }}",
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    mode: mode,
                    id: id
                },
                success: function (response) {
                    if(response.status) {
                        swal({
                            title: "Заказ",
                            text: response.message,
                            icon: "success",
                            button: "Save"
                        });
                    }
                    else {
                        swal({
                            title: "Заказ",
                            text: response.message,
                            icon: "warning",
                            button: "Save"
                        });
                    }
                }
            })
        });
    </script>
@endsection
