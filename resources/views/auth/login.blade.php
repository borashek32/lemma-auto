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

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="mb-6">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Электронная почта') }}" />
                <x-jet-input id="email" class="block border p-2 mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Пароль') }}" />
                <x-jet-input id="password" class="border p-2 block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Запомнить меня') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Забыли пароль?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Войти') }}
                </x-jet-button>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-right text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                    {{ __('Еще не зарегистрировались?') }}
                </a>
            </div>
        </form>


        <div>
            <div class="mb-6 mt-4">
                <p class="text-center">
                    Войти через социальные сети:
                </p>
            </div>
            <div class="grid grid-cols-9">
                <div class="grid-cols-1">
                    <a href="{{ route('github') }}">
                        <img src="/img/social_icons/github.png" alt="вход с github" width="40px">
                    </a>
                </div>

                <div class="grid-cols-1">
                    <a href="{{ route('facebook') }}">
                        <img src="/img/social_icons/facebook.png" alt="вход с facebook" width="40px">
                    </a>
                </div>

                <div class="grid-cols-1">
                    <a href="{{ route('google') }}">
                        <img src="/img/social_icons/google.png" alt="вход с google" width="40px">
                    </a>
                </div>

                <div class="grid-cols-1">
                    <a href="{{ route('vkontakte') }}">
                        <img src="/img/social_icons/vkontakte.jpg" alt="вход с vkontakte" width="40px">
                    </a>
                </div>

                <!--<div class="grid-cols-1">-->
                <!--    <a href="#">-->
                <!--        <img src="/img/social_icons/yandex.png" alt="вход с yandex" width="40px">-->
                <!--    </a>-->
                <!--</div>-->

                <!--<div class="grid-cols-1">-->
                <!--    <a href="#">-->
                <!--        <img src="/img/social_icons/apple.jpeg" alt="вход с apple" width="40px">-->
                <!--    </a>-->
                <!--</div>-->

                <!--<div class="grid-cols-1 pt-1">-->
                <!--    <a href="#">-->
                <!--        <img src="/img/social_icons/instagram.jpeg" alt="вход с instagram" width="40px">-->
                <!--    </a>-->
                <!--</div>-->

                <!--<div class="grid-cols-1">-->
                <!--    <a href="#">-->
                <!--        <img src="/img/social_icons/telegram.png" alt="вход с telegram" width="40px">-->
                <!--    </a>-->
                <!--</div>-->

                <!--<div class="grid-cols-1">-->
                <!--    <a href="#">-->
                <!--        <img src="/img/social_icons/youtube.png" alt="вход с youtube" width="40px">-->
                <!--    </a>-->
                <!--</div>-->
            </div>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
