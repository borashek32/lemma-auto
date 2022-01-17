<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="robots" content="noindex" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Лемма-авто: Личный кабинет</title>
        
        <link rel="icon" type="image/x-icon" href="/favicon.ico" />
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/android-chrome-512x512.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/android-chrome-192x192.png">
        <link rel="icon" type="image/png" sizes="120x120" href="/120-120.png">
        
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
        <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet">
        @livewireScripts
        @livewireStyles
        <link type="text/css" href="https://www.unpkg.com/trix@1.2.2/dist/trix.css" rel="stylesheet">
        

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script>
    </head>
    <body class="font-sans antialiased">

    <div class="min-h-screen bg-gray-100">
        <!--<div class="fixed">-->
        @livewire('navigation-dropdown')
        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        <!--</div>-->
        <!-- Side bar-->
        <div id="sidebar" class="inset-x-0 top-0 h-screen w-16 menu bg-white text-white px-4 flex items-center nunito static fixed shadow">
            <ul class="list-reset">
                <li class="my-2 md:my-0">
                    <li class="my-2 md:my-0">
                        <a href="{{ route('welcome') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                            <i class="fas fa-layer-group mr-3"></i>
                            <span class="w-full inline-block pb-1 md:pb-0 text-sm">
                                Добро<p style="margin-top:-4px">пожаловать</p>
                            </span>
                        </a>
                    </li>
                    <a href="{{ route('profile.show') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                        <i class="fas fa-home fa-fw mr-3"></i>
                        <span class="w-full inline-block pb-1 md:pb-0 text-sm">
                            Профиль
                        </span>
                    </a>
                </li>
                @if(Auth::user()->hasRole('user'))
                    <li class="my-2 md:my-0" id="sidebar">
                        <a href="{{ route('cart.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                            <i class="fas fa-cart-arrow-down mr-3"></i>
                            <span class="w-full inline-block pb-1 md:pb-0 text-sm">
                                Корзина
                            </span>
                        </a>
                    </li>
                    <li class="my-2 md:my-0 ">
                        <a href="{{ route('orders.all') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                            <i class="fas fa-briefcase mr-3"></i>
                            <span class="w-full inline-block pb-1 md:pb-0 text-sm">
                                Ваши заказы
                            </span>
                        </a>
                    </li>
                    <li class="my-2 md:my-0 ">
                        <a href="{{ route('addresses.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                            <i class="fas fa-phone-square mr-3"></i>
                            <span class="w-full inline-block pb-1 md:pb-0 text-sm">
                                Контакты
                            </span>
                        </a>
                    </li>
                    <li class="my-2 md:my-0 ">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-jet-nav-link href="{{ route('logout') }}" :active="request()->routeIs('dashboard')"
                                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <i class="fas fa-sign-out-alt mr-3"></i>
                                <span class="ml-6 w-full inline-block pb-1 md:pb-0 text-sm">
                                    Выход
                                </span>
                            </x-jet-nav-link>
                        </form>
                    </li>
                @endif
                @if(Auth::user()->hasRole('super-admin'))
                    <li class="my-2 md:my-0 ">
                        <a href="{{ route('auto-parts-admin') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                            <i class="fas fa-tasks fa-fw mr-3"></i>
                            <span class="w-full inline-block pb-1 md:pb-0 text-sm">
                                Каталог<br>автозапчастей
                            </span>
                        </a>
                    </li>
                    <li class="my-2 md:my-0 ">
                        <a href="{{ route('users') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                            <i class="fas fa-user-friends mr-3"></i>
                            <span class="w-full inline-block pb-1 md:pb-0 text-sm">
                                Все<br>пользователи
                            </span>
                        </a>
                    </li>
                    <li class="my-2 md:my-0 ">
                        <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                            <i class="fa fa-wallet fa-fw mr-3"></i>
                            <span class="w-full inline-block pb-1 md:pb-0 text-sm">
                                Клиенты
                            </span>
                        </a>
                    </li>
                    <li class="my-2 md:my-0 ">
                        <a href="{{ route('reviews-admin') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                            <i class="fas fa-copy mr-3"></i>
                            <span class="w-full inline-block pb-1 md:pb-0 text-sm">
                                Отзывы<br>клиентов
                            </span>
                        </a>
                    </li>
                    <li class="my-2 md:my-0 ">
                        <a href="{{ route('advertisements.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                            <i class="fab fa-adversal mr-3"></i>
                            <span class="w-full inline-block pb-1 md:pb-0 text-sm">
                                Реклама
                            </span>
                        </a>
                    </li>
                    <li class="my-2 md:my-0 ">
                        <a href="{{ route('cats') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                            <i class="fas fa-book-reader mr-3"></i>
                            <span class="w-full inline-block pb-1 md:pb-0 text-sm">
                                Категории<br>в блоге
                            </span>
                        </a>
                    </li>
                    <li class="my-2 md:my-0 ">
                        <a href="{{ route('posts.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                            <i class="fas fa-book-open mr-3"></i>
                            <span class="w-full inline-block pb-1 md:pb-0 text-sm">
                                Посты<br>в блоге
                            </span>
                        </a>
                    </li>
                    <li class="my-2 md:my-0 ">
                        <a href="{{ route('comments-admin') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                            <i class="fas fa-comments mr-3"></i>
                            <span class="w-full inline-block pb-1 md:pb-0 text-sm">
                                Комментарии
                            </span>
                        </a>
                    </li>
                    <li class="my-2 md:my-0">
                        <a href="{{ route('offices') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                            <i class="fas fa-phone-square mr-3"></i>
                            <span class="w-full inline-block pb-1 md:pb-0 text-sm">
                                Офисы
                            </span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>

        <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @yield('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.3.2.js"></script>
    <script src="/js/jquery.maskedinput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.min.js" defer></script>
    <script src="https://www.unpkg.com/trix@1.2.2/dist/trix.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    
    <style>
            .nunito {
                font-family: 'nunito', font-sans, serif;
            }

            hover\:border-none:hover {
                border-style: none;
            }

            #sidebar {
                transition: ease-in-out all .3s;
                z-index: 9999;
            }

            #sidebar span {
                opacity: 0;
                position: absolute;
                transition: ease-in-out all .1s;
            }

            #sidebar:hover {
                width: 170px;
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6);
                /*shadow-2xl*/
            }

            #sidebar:hover span {
                opacity: 1;
            }
            
            @media (max-width: 1352px) {
                #sidebar {
                    display:none;
                }
            }
            .card-order {
                 display: none;
            }
            @media (max-width: 900px) {
                .iteration {
                    display: none;
                }
            }
            @media (max-width: 782px) {
                .card-order {
                    display: block;
                }
                .table-order {
                    display: none;
                }
            }
        </style>
    </body>
</html>
