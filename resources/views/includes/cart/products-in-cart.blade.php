<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
    @if(Cart::count() > 0)
        <h2 class="mb-2">Всего товаров в вашей корзине: {{ Cart::count() }} шт.</h2>

        <p class="mb-2">Итоговая стоимость: {{ Cart::total() }} руб.</p>

        <a href="{{ route('auto-parts') }}">
            <p class="underline">В магазин</p>
        </a>
        <br>
        <table class="table-fixed w-full table-order">
            <thead>
            <tr class="bg-gray-100">
                <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10 iteration">№</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Каталожный<br>номер</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Название</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Срок<br>доставки</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Количество</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Цена</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Действия</th>
            </tr>
            </thead>

            <tbody>
            @foreach(Cart::content() as $item)
                <tr>
                    <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5 iteration">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5" style="white-space: pre-line">
                        {{ $item->options->has('number') ? $item->options->number : '' }}
                    </td>
                    <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">
                        {{ $item->options->brand }}, {{ $item->name }}
                    </td>
                    <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">
                        {{ date("d.m.y", strtotime($item->options->shipment_date)) }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">
                        <input type="number" class="quantity outline-none focus:outline-none text-center w-20 bg-white
                            font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default
                            flex items-center text-gray-700 border border-gray-400 rounded-md p-2 outline-none"
                            name="required_quantity" data-id="{{ $item->rowId }}" id="qty-input-{{ $item->rowId }}"
                            step="1" min="1" max="{{ $item->options->stock_quantity }}" value="{{ $item->qty }}">
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">
                        {{ number_format($item->subtotal, 2) }} руб.
                    </td>

                    <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">
                        <div class="">
                            <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Удалить" class="bg-red-500 hover:bg-red-700
                                        text-white mt-2 font-bold py-2 px-4 rounded">
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="flex flex-cols-2 items-center card-order">
            @foreach(Cart::content() as $item)
                <div class="bg-white shadow-xl rounded-lg overflow-hidden border-gray-200 m-4">
                    <div class="p-4">
                        <p class="uppercase tracking-wide text-sm font-bold text-gray-700">
                            Каталожный номер • {{ $item->options->has('number') ? $item->options->number : '' }}
                        </p>
                        <p class="text-lg text-gray-900">
                            Название • {{ $item->options->brand }}, {{ $item->name }}
                        </p>
                        <p class="text-lg text-gray-900">
                            Срок доставки • {{ date("d.m.y", strtotime($item->options->shipment_date)) }}
                        </p>
                    </div>
                    <div class="px-4 pt-3 pb-4 border-t border-gray-300 bg-gray-100">
                        <div class="text-xs uppercase font-bold text-gray-600 tracking-wide flex flex-col-2">
                            <p class="mt-2 mr-4">
                                Количество
                            </p>
                            <input type="number" class="quantity outline-none focus:outline-none text-center w-20 bg-white
                                font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default
                                flex items-center text-gray-700 border border-gray-400 rounded-md p-2 outline-none"
                                   name="quantity" data-id="{{ $item->rowId }}" id="qty-input-{{ $item->rowId }}"
                                   step="1" min="1" max="{{ $item->options->stock_quantity }}" value="{{ $item->qty }}">
                        </div>
                        <div class="text-xs uppercase font-bold text-gray-600 tracking-wide mt-4">
                            Цена • {{ number_format($item->subtotal, 2) }} руб.
                        </div>
                        <div class="flex items-center pt-2">
                            <div class="">
                                <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Удалить" class="bg-red-500 hover:bg-red-700
                                        text-white mt-2 font-bold py-2 px-4 rounded">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="m-10">
            <a href="{{ route('shipment') }}" class="bg-green-500 hover:bg-green-700
                   text-white font-bold py-2 px-4 rounded">
                Продолжить
            </a>
        </div>
    @else
        <div class="text-lg">
            Товаров пока нет в корзине. Перейдите по ссылке в магазин автозапчестей и расходных материалов
        </div>
        <a href="{{ route('auto-parts') }}">
            В магазин
        </a>
    @endif
</div>

<script>
    (function () {
        const classname = document.querySelectorAll('.quantity')

        Array.from(classname).forEach(function(element) {
            element.addEventListener('change', function () {
                const id = element.getAttribute('data-id')
                axios.patch(`/dashboard/cart/${id}`, {
                    quantity: this.value
                })
                    .then(function (success) {
                        // console.log(response);
                        window.location.href = '{{ route('cart.index') }}'
                    })
                    .catch(function (error) {
                        console.log(error);
                        window.location.href = '{{ route('cart.index') }}'
                    });
            })
        })
    })();
</script>

