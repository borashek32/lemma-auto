
    <form action="{{ route('products-import') }}" method="post" enctype="multipart/form-data">
        <div class="grid grid-cols-2">
            <div class="grid-cols-1">
                @csrf
                <input type="file" class="w-full shadow appearance-none border my-3 rounded py-2
                        px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1"
                        placeholder="Выберите файл" name="file">

                @error('search')<span class="text-red-500">{{ $message }}</span>@enderror
            </div>

            <div class="grid-cols-1">
                <button type="submit" class="ml-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">
                    Загрузить
                </button>
            </div>
        </div>
    </form>

