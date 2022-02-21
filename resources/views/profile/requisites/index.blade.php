@extends('layouts.layoutControllers')
@section('content')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                @if(Auth::user()->status_id == 2)
                    {{ __('Реквизиты организации') }}
                @endif
            </h2>
        </div>
    </header>
    @if(Auth::user()->status_id == 2)
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @include('includes.admin.messages')
                @include('includes.messages_errors')

                @if(Auth::user()->requisites)
                    <div class="bg-teal-100 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                        <div class="flex">
                            <div>
                                <p>
                                    Реквизиты вашей организации успешно загружены.
                                    В любое время вы можете их удалить и добавить новые.
                                </p>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    <div class="mb-10">
                        <div class="flex flex-wrap md:flex-row w-full">
                            <div class="w-full md:w-3/10 text-left">
                                @if(!Auth::user()->requisites)
                                    <div class="mb-4">
                                        <p>Загрзите файл, содержащий реквизиты организации, в формате .doc, .docx:</p>
                                    </div>
                                    <div class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-xl p-5">
                                        <div class="flex flex-row items-center text-center">
                                            <div class="flex-shrink pr-4">
                                                <div class="rounded-full p-5 bg-yellow-600">
                                                    <i class="fas fa-inbox fa-2x fa-inverse"></i>
                                                </div>
                                            </div>
                                            <div class="">
                                                <form action="{{ route('requisites.store') }}" method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                    @csrf
                                                    <div class="w-full">
                                                        <input type="file" name="requisites" class="block mt-1 w-full" required
                                                               aria-describedby="emailHelp" placeholder="Выберите файл" id="requisites">

                                                        <x-jet-button type="submit" class="" style="margin-top: 10px">
                                                            Загрузить
                                                        </x-jet-button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(Auth::user()->requisites)
                                    <table class="table-fixed w-full mt-10">
                                        <thead>
                                            <tr class="bg-gray-100">
                                                <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Файл с реквизитами организации</th>
                                                <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Действие</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">
                                                    {{ $user_requisites->original_filename }}
                                                </td>

                                                <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">
                                                    <div class="">
                                                        <form action="{{ route('requisites.destroy', Auth::user()) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="submit" value="Удалить" class="bg-red-500 hover:bg-red-700
                                                                text-white font-bold py-2 px-4 rounded">
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection('content')
