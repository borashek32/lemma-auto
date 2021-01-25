@section('title-block')Пользователи сайта@endsection('title-block')
@extends('layouts.app')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-5">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <h1>Список пользователей сайта</h1>
                    <div class="flex py-5 flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead>
                                            <tr>
                                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Имя
                                                </th>
                                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Email
                                                </th>
                                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Роль
                                                </th>
                                                <th class="px-6 py-3 bg-gray-50"></th>
                                            </tr>
                                        </thead>
                                        @foreach($users as $user)
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-no-wrap">
                                                        <div class="flex items-center">
                                                            <div class="flex-shrink-0 h-10 w-10">

                                                            </div>
                                                            <div class="ml-4">
                                                                <div class="text-sm leading-5 font-medium text-gray-900">
                                                                    {{ $user->name }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                                        {{ $user->email }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
        {{--                                                {{ $user->role }}--}}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                                        <span class="inline-flex rounded-md shadow-sm">
                                                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent
                                                              text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500
                                                              focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700
                                                              transition duration-150 ease-in-out">
                                                                Изменить
                                                            </button>
                                                        </span>
                                                        <span class="inline-flex rounded-md shadow-sm">
                                                            <form action="{{ route('admin.users.delete', $user) }}" method="DELETE">
                                                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent
                                                                  text-sm leading-5 font-medium rounded-md text-white bg-red-600 hover:bg-red-500
                                                                  focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-red-700
                                                                  transition duration-150 ease-in-out">
                                                                    Удалить
                                                                </button>
                                                            </form>
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection('content)

