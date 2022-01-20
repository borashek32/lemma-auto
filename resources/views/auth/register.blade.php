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

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Имя') }}" />
                <x-jet-input id="name" class="block p-2 border mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Электронная почта') }}" />
                <x-jet-input id="email" class="block p-2 border mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="phone" value="{{ __('Контактный телефон') }}" />
                <x-jet-input id="phone" class="phone block p-2 border mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Пароль') }}" />
                <x-jet-input id="password" class="block p-2 border mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Подтвердите пароль') }}" />
                <x-jet-input id="password_confirmation" class="p-2 block border mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="status" value="{{ __('Ваш статус') }}" />
                <label class="inline-flex items-center mt-3">
                    <input type="checkbox" name="status" value="1" class="form-checkbox h-5 w-5 text-gray-600">
                    <span class="ml-2 text-gray-700">физическое лицо</span>
                </label>
                <br>
                <label class="inline-flex items-center mt-3">
                    <input type="checkbox" name="status" value="2" class="form-checkbox h-5 w-5 text-gray-600">
                    <span class="ml-2 text-gray-700">юридическое лицо</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Уже зарегистрировались?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Регистрация') }}
                </x-jet-button>
            </div>
        </form>

        <!--<div class="mt-4">-->
        <!--    <div class="mb-2">-->
        <!--        <p class="text-center">-->
        <!--            Зарегистрироваться через социальные сети:-->
        <!--        </p>-->
        <!--    </div>-->
        <!--    <div class="grid grid-cols-9">-->
        <!--        <div class="grid-cols-1">-->
        <!--            <a href="{{ route('github') }}">-->
        <!--                <img src="/img/social_icons/github.png" alt="вход с github" width="40px">-->
        <!--            </a>-->
        <!--        </div>-->

        <!--        <div class="grid-cols-1">-->
        <!--            <a href="{{ route('facebook') }}">-->
        <!--                <img src="/img/social_icons/facebook.png" alt="вход с facebook" width="40px">-->
        <!--            </a>-->
        <!--        </div>-->

        <!--        <div class="grid-cols-1">-->
        <!--            <a href="{{ route('google') }}">-->
        <!--                <img src="/img/social_icons/google.png" alt="вход с google" width="40px">-->
        <!--            </a>-->
        <!--        </div>-->

        <!--        <div class="grid-cols-1">-->
        <!--            <a href="{{ route('vkontakte') }}">-->
        <!--                <img src="/img/social_icons/vkontakte.jpg" alt="вход с vkontakte" width="40px">-->
        <!--            </a>-->
        <!--        </div>-->

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
        <!--    </div>-->
        <!--</div>-->

        <script src="/js/jquery.maskedinput.min.js"></script>
        <script>
            $("#phone").mask("8 (999) 999-99-99");
        </script>
    </x-jet-authentication-card>
</x-guest-layout>



