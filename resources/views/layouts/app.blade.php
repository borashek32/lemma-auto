<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="/img/icon.png" type="image/x-icon">
        <title>Лемма Авто Админ</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
        <!--Replace with your tailwind.css once created-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">

        @livewireStyles

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
        </style>

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script>
    </head>
    <body class="font-sans antialiased">

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-dropdown')

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>

        <!-- Side bar-->
        <div id="sidebar" class="inset-x-0 top-0 h-screen w-16 menu bg-white text-white px-4 flex items-center nunito static fixed shadow">

            <ul class="list-reset">
                <li class="my-2 md:my-0">
                    <a href="{{ route('profile.show') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                        <i class="fas fa-home fa-fw mr-3"></i>
                        <span class="w-full inline-block pb-1 md:pb-0 text-sm">
                            Профиль
                        </span>
                    </a>
                </li>
                @if(Auth::user()->hasRole('user'))
                    <li class="my-2 md:my-0 ">
                        <a href="№" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                            <i class="fas fa-cart-arrow-down mr-3"></i>
                            <span class="w-full inline-block pb-1 md:pb-0 text-sm">
                                Корзина
                            </span>
                        </a>
                    </li>
                    <li class="my-2 md:my-0 ">
                        <a href="{{ route('contacts') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                            <i class="fas fa-phone-square mr-3"></i>
                            <span class="w-full inline-block pb-1 md:pb-0 text-sm">
                                Контакты
                            </span>
                        </a>
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
                        <a href="{{ route('advs-blog') }}" class="block mt-4 py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
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
                        <a href="{{ route('posts') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
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
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>
