@section('title-block')Заказ@endsection('title-block')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md text-gray-800 leading-tight">
            <a href="#">
                Заказ отправлен на обработку
            </a>
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <table class="table-fixed w-full">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Каталожный<br>номер</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Название</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Количество</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($order->products as $product)
                            <tr>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $product->code }}</td>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $product->title }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">{{ $product->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

@section('scripts')

@endsection

