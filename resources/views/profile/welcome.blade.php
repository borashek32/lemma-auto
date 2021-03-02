<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if(Auth::user()->hasRole('user'))
                {{ __('Панель инструментов пользователя') }}
            @endif
            @if(Auth::user()->hasRole('super-admin'))
                {{ __('Панель инструментов администратора') }}
            @endif
        </h2>
    </x-slot>

    <div>
        welcome
    </div>
</x-app-layout>
