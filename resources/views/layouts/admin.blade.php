<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title-block')</title>
        <link rel="shortcut icon" href="/img/icon.png" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @livewireStyles
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tailwindcss/ui@latest/dist/tailwind-ui.min.css">
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="flex-shrink-0 flex items-center">
                                <a href="/">
                                    <img src="/img/icon.png" width="80px" alt="logo Lemma-auto">
                                </a>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <x-jet-nav-link href="/admin/users/profile" :active="request()->routeIs('dashboard')">
                                    {{ __('Профиль') }}
                                </x-jet-nav-link>
                                <x-jet-nav-link href="/user/profile/contacts" :active="request()->routeIs('dashboard')">
                                    {{ __('Каталог а/з') }}
                                </x-jet-nav-link>
                                <x-jet-nav-link href="/user/profile/contacts" :active="request()->routeIs('dashboard')">
                                    {{ __('Клиенты') }}
                                </x-jet-nav-link>
                                <x-jet-nav-link href="/admin/users">
                                    {{ __('Пользователи') }}
                                </x-jet-nav-link>

                                <div class="relative inline-block text-left">
                                    <div x-data="{ open: false }">
                                        <span @click="open = true">
                                            <button type="button" class="inline-flex justify-center w-full rounded-md px-4 py-6 bg-white text-sm
                                                leading-5 font-medium text-gray-700 hover:text-gray-500 active:bg-gray-50 active:text-gray-800 transition
                                                ease-in-out duration-150" id="options-menu" aria-haspopup="true" aria-expanded="true">
                                                    {{ __('Автожурнал') }}
                                                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                        <div x-show="open" @click.away="open = false">
                                            <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg">
                                                <div class="rounded-md bg-white shadow-xs">
                                                    <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                                        <a href="{{ route('posts') }}" class="block px-4 py-2 text-sm leading-5 text-gray-700
                                                        hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900"
                                                           role="menuitem">Автожурнал: блог</a>
                                                        <a href="{{ route('admin.posts.create') }}" class="block px-4 py-2 text-sm leading-5 text-gray-700
                                                        hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900"
                                                           role="menuitem">Добавить пост</a>
                                                        <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100
                                                        hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900"
                                                           role="menuitem">License</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <x-jet-nav-link href="/admin/reviews">
                                    {{ __('Отзывы') }}
                                </x-jet-nav-link>
                                <x-jet-nav-link href="/user/profile/contacts" :active="request()->routeIs('dashboard')">
                                    {{ __('Контакты') }}
                                </x-jet-nav-link>
                            </div>
                        </div>

                        <!-- Settings Dropdown -->
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <x-jet-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-jet-responsive-nav-link href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Выход') }}
                                        </x-jet-responsive-nav-link>
                                    </form>
                                </x-slot>
                                <x-slot name="content">

                                </x-slot>
                            </x-jet-dropdown>
                        </div>
                    </div>
                </div>
            </nav>


            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    @yield('title-block')
                </div>
            </header>

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
