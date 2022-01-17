<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if(Auth::user()->hasRole('user'))
                {{ __('Панель управления') }}
            @endif
            @if(Auth::user()->hasRole('super-admin'))
                {{ __('Админ-панель магазина') }}
            @endif
        </h2>
    </x-slot>

    @if(Auth::user()->hasRole('user'))
        <div class="py-4">
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
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
                    <div class="flex flex-wrap">
                        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                            <!--Metric Card-->
                            <a href="{{ route('orders.all') }}">
                                <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                                    <div class="flex flex-row items-center">
                                        <div class="flex-shrink pr-4">
                                            <div class="rounded-full p-5 bg-green-600"><i class="fa fa-wallet fa-2x fa-inverse"></i></div>
                                        </div>
                                        <div class="flex-1 text-right md:text-center">
                                            <h5 class="font-bold uppercase text-gray-600">Ваши заказы</h5>
                                            <h3 class="font-bold text-3xl">{{ Auth::user()->orders->count() }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <!--/Metric Card-->
                        </div>
                        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                            <!--Metric Card-->
                            <a href="{{ route('cart.index') }}">
                                <div class="bg-gradient-to-b from-pink-200 to-pink-100 border-b-4 border-pink-500 rounded-lg shadow-xl p-5">
                                    <div class="flex flex-row items-center">
                                        <div class="flex-shrink pr-4">
                                            <div class="rounded-full p-5 bg-pink-600"><i class="fas fa-shopping-cart fa-2x fa-inverse"></i></div>
                                        </div>
                                        <div class="flex-1 text-right md:text-center">
                                            <h5 class="font-bold uppercase text-gray-600">Корзина</h5>

                                            <h3 class="font-bold text-3xl">
                                                {{ Cart::count() }}

                                                <span class="text-pink-500">
                                                    <i class="fas fa-exchange-alt"></i>
                                                </span>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <!--/Metric Card-->
                        </div>
                        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                            <!--Metric Card-->
                            <a href="{{ route('mailings.index') }}">
                                <div class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-xl p-5">
                                    <div class="flex flex-row items-center text-center">
                                        <div class="flex-shrink pr-4">
                                            <div class="rounded-full p-5 bg-yellow-600"><i class="fas fa-archive fa-2x"></i></div>
                                        </div>
                                        <div class="flex-1 text-right md:text-center">
                                            <h5 class="font-bold uppercase text-gray-600">Управление<br>подпиской</h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <!--/Metric Card-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(Auth::user()->hasRole('super-admin'))
        <div class="py-4">
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    <div class="flex flex-wrap">
                        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                            <!--Metric Card-->
                            <a href="{{ route('admin-orders.index') }}">
                                <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                                    <div class="flex flex-row items-center">
                                        <div class="flex-shrink pr-4">
                                            <div class="rounded-full p-5 bg-green-600"><i class="fa fa-wallet fa-2x fa-inverse"></i></div>
                                        </div>
                                        <div class="flex-1 text-right md:text-center">
                                            <h5 class="font-bold uppercase text-gray-600">Всего<br>заказов</h5>
                                            <h3 class="font-bold text-3xl">{{ \App\Models\Order::all()->count() }} <span class="text-green-500"><i class="fas fa-caret-up"></i></span></h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <!--/Metric Card-->
                        </div>
                        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                            <!--Metric Card-->
                            <a href="{{ route('users') }}">
                                <div class="bg-gradient-to-b from-pink-200 to-pink-100 border-b-4 border-pink-500 rounded-lg shadow-xl p-5">
                                    <div class="flex flex-row items-center">
                                        <div class="flex-shrink pr-4">
                                            <div class="rounded-full p-5 bg-pink-600"><i class="fas fa-users fa-2x fa-inverse"></i></div>
                                        </div>
                                        <div class="flex-1 text-right md:text-center">
                                            <h5 class="font-bold uppercase text-gray-600">всего<br>пользователей</h5>
                                            <h3 class="font-bold text-3xl">{{ \App\Models\User::all()->count() }} <span class="text-pink-500"><i class="fas fa-exchange-alt"></i></span></h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <!--/Metric Card-->
                        </div>
                        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                            <!--Metric Card-->
                            <a href="{{ route('users') }}">
                                <div class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-xl p-5">
                                    <div class="flex flex-row items-center">
                                        <div class="flex-shrink pr-4">
                                            <div class="rounded-full p-5 bg-yellow-600"><i class="fas fa-user-plus fa-2x fa-inverse"></i></div>
                                        </div>
                                        <div class="flex-1 text-right md:text-center">
                                            <h5 class="font-bold uppercase text-gray-600">Сегодня<br>зарегистрировались</h5>
                                            <h3 class="font-bold text-3xl">{{ \App\Models\User::whereDate('created_at', \Carbon\Carbon::today())->count() }} <span class="text-yellow-600"><i class="fas fa-caret-up"></i></span></h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <!--/Metric Card-->
                        </div>
                        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                            <!--Metric Card-->
                            <a href="{{ route('posts.index') }}">
                                <div class="bg-gradient-to-b from-blue-200 to-blue-100 border-b-4 border-blue-500 rounded-lg shadow-xl p-5">
                                    <div class="flex flex-row items-center">
                                        <div class="flex-shrink pr-4">
                                            <div class="rounded-full p-5 bg-blue-600"><i class="fas fa-server fa-2x fa-inverse"></i></div>
                                        </div>
                                        <div class="flex-1 text-right md:text-center">
                                            <h5 class="font-bold uppercase text-gray-600">Всего<br>постов в блоге</h5>
                                            <h3 class="font-bold text-3xl">{{ \App\Models\Post::all()->count() }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <!--/Metric Card-->
                        </div>
                        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                            <!--Metric Card-->
                            <a href="{{ route('comments-admin') }}">
                                <div class="bg-gradient-to-b from-red-200 to-red-100 border-b-4 border-red-500 rounded-lg shadow-xl p-5">
                                    <div class="flex flex-row items-center">
                                        <div class="flex-shrink pr-4">
                                            <div class="rounded-full p-5 bg-red-600"><i class="fas fa-inbox fa-2x fa-inverse"></i></div>
                                        </div>
                                        <div class="flex-1 text-right md:text-center">
                                            <h5 class="font-bold uppercase text-gray-600">Всего<br>комментариев</h5>
                                            <h3 class="font-bold text-3xl">{{ \Laravelista\Comments\Comment::all()->count() }} <span class="text-red-500"><i class="fas fa-caret-up"></i></span></h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <!--/Metric Card-->
                        </div>
                        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                            <!--Metric Card-->
                            <a href="{{ route('admin-orders.index') }}">
                                <div class="bg-gradient-to-b from-black-200 to-black-100 border-b-4 border-black-500 rounded-lg shadow-xl p-5">
                                    <div class="flex flex-row items-center">
                                        <div class="flex-shrink pr-4">
                                            <div class="rounded-full p-5 bg-indigo-600"><i class="fas fa-tasks fa-2x fa-inverse"></i></div>
                                        </div>
                                        <div class="flex-1 text-right md:text-center">
                                            <h5 class="font-bold uppercase text-gray-600">Заказов<br>выполнено</h5>
                                            <h3 class="font-bold text-3xl">{{ \App\Models\Order::where('status', 'выполнен')->count() }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <!--/Metric Card-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

</x-app-layout>
