<form method="get" action="{{ route('advertisements.index') }}" class="input-group mb-3">
    <div class="grid grid-cols-2 mb-4 mt-3">
        <input type="text" class="shadow appearance-none border rounded w-100 py-2 px-3 text-gray-700
            leading-tight focus:outline-none focus:shadow-outline mb-4 mr-2" style="margin-left: -120px"
            placeholder="Введите ключевые слова" aria-label="Username" id="search" name="search"
            aria-describedby="basic-addon1">
        <button type="submit" class="shadow appearance-none border rounded w-20 h-9 text-center py-2 px-3 text-gray-700
            leading-tight focus:outline-none focus:shadow-outline">
            Поиск
        </button>
    </div>
    @error('search')<span class="text-red-500">{{ $message }}</span>@enderror
</form>

