<x-jet-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Обновить пароль') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Используйте предложеный случайный пароль.') }}
        <br>
        
        <p>
            <i class="fas fa-key"></i>
            Если вы не помните свой пароль, тогда воспользуйтесь ссылкой ниже:
        </p>
        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
            Забыли пароль?
        </a>
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="current_password" value="{{ __('Текущий пароль') }}" />
            <x-jet-input id="current_password" type="password" class="border p-2 block mt-1 w-full" wire:model.defer="state.current_password" autocomplete="current-password" />
            <x-jet-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="password" value="{{ __('Новый пароль') }}" />
            <x-jet-input id="password" type="password" class="border p-2 block mt-1 w-full" wire:model.defer="state.password" autocomplete="new-password" />
            <x-jet-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="password_confirmation" value="{{ __('Подтвердите новый пароль') }}" />
            <x-jet-input id="password_confirmation" type="password" class="border p-2 block mt-1 w-full" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
            <x-jet-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Сохранено.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Сохранить') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
