<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
    <div class="flex flex-wrap">
        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <form action="{{ route('update-status.update', Auth::user()->id) }}">
                @method('PUT')
                @csrf

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="status" value="{{ __('Ваш статус') }}" />
                    <label class="inline-flex items-center mt-3">
                        <input type="checkbox" name="status" value="1" @if (\App\Models\Status::where('id', Auth::user()->id) && \App\Models\Status::where('status', 1)->first()) checked @endif
                        class="form-checkbox h-5 w-5 text-gray-600" >
                        <span class="ml-2 text-gray-700">физическое лицо</span>
                    </label>
                    <br>
                    <label class="inline-flex items-center mt-3">
                        <input type="checkbox" name="status" value="2" @if (\App\Models\Status::where('id', Auth::user()->id) && \App\Models\Status::where('status', 2)->first()) checked @endif
                        class="form-checkbox h-5 w-5 text-gray-600" >
                        <span class="ml-2 text-gray-700">юридическое лицо</span>
                    </label>
                </div>

                <input type="submit" value="Сохранить" class="ml-4">
            </form>
        </div>
    </div>
</div>