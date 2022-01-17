<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <a href="{{ route('auto-parts') }}"><img src="/img/icon.png" width="100px"></a>
            <a href="{{ route('auto-parts') }}">
                <p class="text-center">
                    Верунться на<br>главную
                </p>
            </a>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div>
                <x-jet-label for="email" value="{{ __('Электронная почта') }}" />
                <x-jet-input id="email" class="block border p-2 mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Новый пароль') }}" />
                <x-jet-input id="password" class="block border p-2 mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Подтвердите новый пароль') }}" />
                <x-jet-input id="password_confirmation" class="block border p-2 mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Сбросить пароль') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
