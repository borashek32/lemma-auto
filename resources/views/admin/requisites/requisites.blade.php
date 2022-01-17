<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Управление реквизитами
    </h2>
</x-slot>
<div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (session()->has('success'))
            <div class="bg-teal-100 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <div class="flex md:flex-row w-full">
                <div class="w-full md:w-3/10 text-left">
                    <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Новые реквизиты</button>
                    @if($isOpen)
                        @include('admin.requisites.create')
                    @endif
                </div>
            </div>
            @if(\App\Models\Requisite::all()->count() > 0)
                <table class="min-w-full">
                <thead>
                <tr class="bg-gray-100">
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Название</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Юридичекий адрес</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Фактический адрес</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Счета</th>
{{--                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Реквизиты банка</th>--}}
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($requisites as $requisite)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">{{ $requisite->title }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5" style="white-space: pre-line">{{ $requisite->legal_address }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5" style="white-space: pre-line">{{ $requisite->real_address }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5" style="white-space: pre-line">
                            ИНН/КПП: {{ $requisite->inn_kpp }}
                        </td>
{{--                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">--}}
{{--                            Расчетный счет: {{ $requisite->r_s }}<br>--}}
{{--                            Корреспондентский счет: {{ $requisite->k_s }}<br>--}}
{{--                            БИК: {{ $requisite->bik }}<br>--}}
{{--                        </td>--}}
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">
                            <button wire:click="edit({{ $requisite->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Редактировать</button>
                            <button wire:click="delete({{ $requisite->id }})" class="mt-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Удалить</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
                <p>Реквизиты организации пока не добавлены</p>
            @endif
        </div>
    </div>
</div>
