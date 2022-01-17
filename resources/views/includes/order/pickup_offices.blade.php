<div class="bg-gray-200">
    <div class="p-4">
        <p class="text-sm">
            * Самовывоз доступен для всех заказов, не зависимо от габаритов
        </p>

        <div class="flex flex-col items-center p-4 justify-center">
            <div class="flex flex-col">
                @foreach($contacts as $contact)
                    <label class="inline-flex items-center mt-3">
                        <input type="radio" name="contact_id" value="{{ $contact->id }}" id=""
                               class="form-radio h-5 w-5 text-green-600">
                        <p class="ml-2 text-gray-900">{{ $contact->address }}</p>
                    </label>
                    <div class="ml-6">
                        <iframe src="{{ $contact->map }}"
                        width="300" height="200" frameborder="0" style="border:0;" allowfullscreen=""
                        aria-hidden="false"
                        tabindex="0">
                    </iframe>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
