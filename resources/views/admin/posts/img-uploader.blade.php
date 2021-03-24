<div>
    <form action="#" wire:submit.prevent="storePhoto" class="flex flex-col justify-between items-center">
        @if($img)
            <img src="{{ $img->temporaryUrl() }}" alt="{{ $post->title }}" class="w-12 h-12 rounded-full mb-3">
        @else
            <img src="{{ \Illuminate\Support\Facades\Storage::url('docs/' . $post->img) }}"
                 alt="{{ $post->title }}" class="w-12 h-12 rounded-full mb-3">
        @endif

        @if ($img)
            <button type="submit" class="w-full text-xs text-indigo-500 block text-center cursor-pointer">Confirm</button>

            <button wire:click.prevent="$set('img', null)" class="w-full text-xs text-indigo-500 block text-center cursor-pointer">Cancel</button>
        @else
            <label for="img" class="w-full text-xs text-indigo-500 block text-center">
                Change
            </label>
        @endif

        @error('img')
            <span class="font-semibold text-pink-500 text-xs mt-2">{{ $message }}</span>
        @enderror

        <input type="file" name="img" id="img" class="sr-only" wire:model="img">
    </form>
</div>
