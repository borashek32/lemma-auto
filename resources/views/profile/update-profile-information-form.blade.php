<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Обновить личные данные') }}
    </x-slot>

    <x-slot name="description">
        {{ __('') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                       wire:model="photo"
                       x-ref="photo"
                       x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Фото') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ asset('/storage/' . $this->user->profile_photo_path) }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20"
                          x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Выбрать новое фото') }}
                </x-jet-secondary-button>

{{--                @if ($this->user->profile_photo_url)--}}
{{--                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">--}}
{{--                        {{ __('Изменить фото') }}--}}
{{--                    </x-jet-secondary-button>--}}
{{--                @endif--}}

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
    @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Имя') }}" />
            <x-jet-input id="name" type="text" class="border p-2 block mt-1 w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Электронная почта') }}" />
            <x-jet-input id="email" type="email" class="border p-2 block mt-1 w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="phone" value="{{ __('Контактный телефон') }}" />
            <x-jet-input id="phone" type="text" class="border p-2 block mt-1 w-full" wire:model.defer="state.phone" />
            <x-jet-input-error for="phone" class="mt-2" />
        </div>

        <!-- Status -->
{{--        <div class="col-span-6 sm:col-span-4">--}}
{{--            <x-jet-label for="status" value="{{ __('Ваш статус') }}" />--}}
{{--            @foreach(\App\Models\Status::all() as $status)--}}
{{--                <label class="inline-flex items-center mt-3">--}}
{{--                    <input type="checkbox" id="status_id" value="{{ $status->id }}" name="status" wire:model.defer="state.status.{{ $status->id }}"--}}
{{--                           class="form-checkbox h-5 w-5 text-gray-600" @if (Auth::user()->status_id == $status->id) checked @endif>--}}
{{--                    <span class="ml-2 text-gray-700">{{ $status->title }}</span>--}}
{{--                </label>--}}
{{--            @endforeach--}}


{{--            <label class="inline-flex items-center mt-3">--}}
{{--                <input type="checkbox" id="status" value="1" wire:model="state.status.1"--}}
{{--                       class="form-checkbox h-5 w-5 text-gray-600" @if (Auth::user()->status == 1) checked @endif>--}}
{{--                <span class="ml-2 text-gray-700">физическое лицо</span>--}}
{{--            </label>--}}
{{--            <br>--}}
{{--            <label class="inline-flex items-center mt-3">--}}
{{--                <input type="checkbox" id="status" value="2" wire:model="state.status.2"--}}
{{--                       class="form-checkbox h-5 w-5 text-gray-600" @if (Auth::user()->status == 2) checked @endif>--}}
{{--                <span class="ml-2 text-gray-700">юридическое лицо</span>--}}
{{--            </label>--}}
{{--        </div>--}}
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Сохранено.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Сохранить') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
