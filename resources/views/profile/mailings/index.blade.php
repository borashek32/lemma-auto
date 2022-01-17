@extends('layouts.layoutControllers')
@section('content')
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Управление подпиской на новости
        </h2>
    </div>
</header>

<div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @include('includes.admin.messages')

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

            <div class="mb-10">
                <div class="flex flex-wrap md:flex-row w-full">
                    <div class="mb-4">
                        <p>Вы можете оформить подписку на наши новости на несколько элуктронных адресов</p>
                    </div>
                    <div class="w-full md:w-3/10 text-left">
                        <div class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-xl p-5">
                            <div class="flex flex-row items-center text-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded-full p-5 bg-yellow-600">
                                        <i class="fas fa-server fa-2x fa-inverse"></i>
                                    </div>
                                </div>
                                <div class="">
                                    <form action="{{ route('mailings.store') }}" method="POST">
                                        @csrf
                                        <div class="w-full">
                                            <label for="email">
                                                Электронная почта
                                            </label>
                                            <input type="email" name="email" class="block border p-2 mt-1 w-full" id="exampleInputEmail1"
                                                   aria-describedby="emailHelp" placeholder="myemail@gmail.com" value="{{ \Illuminate\Support\Facades\Auth::user()->email }}">

                                            <x-jet-button type="submit" class="" style="margin-top: 10px">
                                                Подписаться
                                            </x-jet-button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if($user->mailings->count() > 0)
                <table class="table-fixed w-full">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Электронная почта</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Действие</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($user->mailings as $mailing)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">
                                    {{ $mailing->email }}
                                </td>

                                <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">
                                    <div class="">
                                        <form action="{{ route('mailings.destroy', $mailing['id']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Отменить" class="bg-red-500 hover:bg-red-700
                                                text-white font-bold py-2 px-4 rounded">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection('content')
