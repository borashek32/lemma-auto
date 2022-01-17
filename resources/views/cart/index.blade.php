@section('title-block')Корзина@endsection('title-block')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Корзина') }}
            ({{ Cart::instance('default')->count() }})
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('includes.messages')

            @include('includes.cart.products-in-cart')
        </div>
    </div>
</x-app-layout>


@section('scripts')

@endsection

