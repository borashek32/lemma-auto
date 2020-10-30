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
                    <x-jet-nav-link href="/dashboard" :active="request()->routeIs('dashboard')">
                        {{ __('Главная') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="/user/profile" :active="request()->routeIs('dashboard')">
                        {{ __('Профиль') }}
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
