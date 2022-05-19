<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Лемма-авто: Личный кабинет</title>
        <link rel="icon" type="image/x-icon" href="/favicon.ico">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

        <!--Replace with your tailwind.css once created-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
        <link rel="stylesheet" href="/css/colorbox.css">
        <link rel="stylesheet" href="{{ asset('css/tagsinput.css') }}">

        @livewireStyles
        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script>
    </head>
    <body class="font-sans antialiased">

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-dropdown')

        <!-- Page Heading -->


        <!-- Side bar-->
        <div id="sidebar" class="inset-x-0 top-0 h-screen w-16 menu bg-white text-white px-4 flex items-center nunito static fixed shadow">

            <ul class="list-reset">
                <li class="my-2 md:my-0">
                    <a href="{{ route('welcome') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                        <i class="fas fa-layer-group mr-3"></i>
                        <span class="w-full inline-block pb-1 md:pb-0 text-sm">
                            Добро<br>пожаловать
                        </span>
                    </a>
                </li>
                <li class="my-2 md:my-0 ">
                    <a href="{{ route('profile.show') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                        <i class="fas fa-home fa-fw mr-3"></i>
                        <span class="w-full inline-block pb-1 md:pb-0 text-sm">
                            Профиль
                        </span>
                    </a>
                </li>
                @if(Auth::user()->status_id == 2)
                    <li class="my-2 md:my-0 ">
                        <a href="{{ route('cart.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                            <i class="far fa-sticky-note mr-3"></i>
                            <span class="w-full inline-block pb-1 md:pb-0 text-sm">
                                Реквизиты
                            </span>
                        </a>
                    </li>
                @endif
                @if(Auth::user()->hasRole('user'))
                    <li class="my-2 md:my-0 ">
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
                        <a href="{{ route('mailings.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                            <i class="fas fa-box mr-3"></i>
                            <span class="w-full inline-block pb-1 md:pb-0 text-sm">
                                Подписка
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
                        <a href="{{ route('users.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
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
                                Посты
                            </span>
                        </a>
                    </li>
                    <li class="my-2 md:my-0 ">
                        <a href="{{ route('comments-admin') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                            <i class="fas fa-comments mr-3"></i>
                            <span class="w-full inline-block pb-1 md:pb-0 text-sm">
                                Комменты
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
                @yield('content')
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        
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
            .address-card {
                 display: none;
            }
            @media (max-width: 1000px) {
                .address-table {
                    display: none;
                }
                .address-card {
                    display: block;
                }
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
        
        {{--    Sweet alert--}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript" src="/js/jquery.colorbox-min.js"></script>
    <script type="text/javascript" src="/packages/barryvdh/elfinder/js/standalonepopup.js"></script>

    <script src="/js/editor.js"></script>
    <script src="{{ asset('js/tagsinput.js') }}"></script>
    {{--    filepond--}}
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    @yield('scripts')
    </body>
</html>
