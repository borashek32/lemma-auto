<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform
        transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true"
             aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">
                                Название организации:
                            </label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                               leading-tight focus:outline-none focus:shadow-outline @error('title') border-red-500 @enderror"
                               id="title" placeholder="Введите название" wire:model="title">
                            @error('title') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="legal_address" class="block text-gray-700 text-sm font-bold mb-2">
                                Юридический адрес:
                            </label>
                            <textarea type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                               leading-tight focus:outline-none focus:shadow-outline @error('legal_address') border-red-500 @enderror"
                                   id="legal_address" placeholder="Введите юридический адрес" wire:model="legal_address"></textarea>
                            @error('legal_address') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="real_address" class="block text-gray-700 text-sm font-bold mb-2">
                                Фактический адрес:
                            </label>
                            <textarea type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                               leading-tight focus:outline-none focus:shadow-outline @error('real_address') border-red-500 @enderror"
                                   id="real_address" placeholder="Введите фактический адрес" wire:model="real_address"></textarea>
                            @error('real_address') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="inn_kpp" class="block text-gray-700 text-sm font-bold mb-2">
                                ИНН/КПП:
                            </label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                               leading-tight focus:outline-none focus:shadow-outline @error('inn_kpp') border-red-500 @enderror"
                                   id="inn_kpp" placeholder="Введите ИНН/КПП" wire:model="inn_kpp">
                            @error('inn_kpp') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="r_s" class="block text-gray-700 text-sm font-bold mb-2">
                                Расчетный счет:
                            </label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                               leading-tight focus:outline-none focus:shadow-outline @error('r_s') border-red-500 @enderror"
                                   id="r_s" placeholder="Введите номер расчетного счета" wire:model="r_s">
                            @error('r_s') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="k_s" class="block text-gray-700 text-sm font-bold mb-2">
                                Корреспондентский счет:
                            </label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                               leading-tight focus:outline-none focus:shadow-outline @error('k_s') border-red-500 @enderror"
                                   id="k_s" placeholder="Введите номер корреспондентского счета" wire:model="k_s">
                            @error('k_s') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="bik" class="block text-gray-700 text-sm font-bold mb-2">
                                БИК:
                            </label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
                               leading-tight focus:outline-none focus:shadow-outline @error('bik') border-red-500 @enderror"
                                   id="bik" placeholder="Введите номер корреспондентского счета" wire:model="bik">
                            @error('bik') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                          <button wire:click.prevent="store()" type="button" class="inline-flex justify-center
                          w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6
                          font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700
                          focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Сохранить
                          </button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                          <button wire:click="closeModal()" type="button" class="inline-flex justify-center w-full
                          rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700
                          shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue
                          transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Выход
                          </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('name').change(function (e) {
      $.get('{{ route('cats') }}',
         { 'name': $(this).val() },
         function ( date ) {
           $('#slug').val(data.slug);
         }
      );
    });
</script>
