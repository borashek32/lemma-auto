<!--Navbar-->
<nav class="navbar-light amber lighten-4 mb-4 mt-4">
    <div class="container">
        <div class="row">
            <a href="https://goo.gl/maps/u3kXeWXDzrFDH4598" style="color:black;cursor:pointer;font-size:12px;margin-top:-10px">
                @include('includes.map-icon')
            </a>
            
            <a href="https://goo.gl/maps/u3kXeWXDzrFDH4598" style="color:black;cursor:pointer;font-size:12px;margin-top:-10px">
                 Москва | 
            </a>
            
            <a href="https://goo.gl/maps/u3kXeWXDzrFDH4598" style="color:black;cursor:pointer;font-size:12px;margin-top:-10px">
                 Коммунарка 
            </a>
            
            <a href="tel:+79169174630" style="margin-left: 10px;font-size:12px;margin-top:-10px;color:black">
                @include('includes.phone-icon')
                +7 (916) 917-46-30
            </a>
        </div>
        <div style="margin-top:20px">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                    <a class="navbar-brand" href="/">ООО "Лемма-авто"</a>
                    <p style="font-size: 8px">Компания на рынке с 2018 года</p>
                </div>
    
                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-6 searchTopEmpty">
                </div>
    
                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7 searchTop">
                    <div class="row mt-2" style="display:flex;">
                        <div class="col-xl-10 cpl-lg-10 col-md-10 col-sm-10 col-10">
                            <form method="get" action="{{ route('search') }}" class="input-group mb-4">
                                <input type="text" class="form-control shadow p-3 bg-body rounded"
                                    style="margin-bottom:0px;margin-right: 10px" placeholder="Введите каталожный номер или название"
                                    aria-label="Username" id="search" name="search" aria-describedby="basic-addon1">
                                <button type="submit" class="btn btn-secondary" style="height: 40px">
                                    Поиск
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2">
                    <div class="displey:flex;flex-direction:row;justify-content:rigth">
                        <button class="navbar-toggler first-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent20"
                            aria-controls="navbarSupportedContent20" aria-expanded="false" aria-label="Toggle navigation">
                            <img src="/files/menu.png" alt="Навигация по сайту" width="50px">
                        </button>
                    </div>
                </div>
    
                <div class="collapse navbar-collapse" id="navbarSupportedContent20">
                    <ul class="navbar-nav mr-auto">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6">
                                <li class="nav-item active">
                                    <p style="font-weight:600" class="nav-link" href="#">Магазин автозапчастей<span class="sr-only">(current)</span></p>
                                </li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('auto-parts') }}">Поиск по каталожному номеру</a>
                                <a class="dropdown-item" href="{{ route('laws') }}">Гарантии</a>
                                <a class="dropdown-item" href="{{ route('delivery') }}">Доставка</a>
                                <a class="dropdown-item" href="{{ route('payment') }}">Оплата</a>
                                <a class="dropdown-item" href="{{ route('requisites') }}">Реквизиты</a>
                                <a class="dropdown-item" href="#">Сотрудничество</a>
                                <a class="dropdown-item" href="#">Скидки и акции %</a>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6">
                                <li class="nav-item active">
                                    <p style="font-weight:600" class="nav-link" href="#">О нас<span class="sr-only">(current)</span></p>
                                </li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('reviews') }}">Отзывы</a>
                                <a class="dropdown-item" href="{{ route('contact') }}">Контакты</a>
                                <a class="dropdown-item" href="{{ route('about-us') }}">Команда</a>
                                <div class="dropdown-item" style="margin-top: -1px; margin-left:10px">
                                    <a href="{{ route('faq') }}">
                                        <img style="" src="https://img.icons8.com/external-bearicons-blue-bearicons/64/000000/external-faq-frequently-asked-questions-faq-bearicons-blue-bearicons-1.png"/>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6">
                                <li class="nav-item active">
                                    <p style="font-weight:600" class="nav-link" href="#">
                                        Блог
                                        <span class="sr-only">(current)</span>
                                    </p>
                                </li>
                                <div class="dropdown-divider"></div>
                                @foreach ($cats as $cat)
                                    <a class="dropdown-item" href="{{ route('category', $cat->slug) }}">{{ $cat->name }}</a>
                                @endforeach
                                <li class="dropdown-item">
                                    @include('includes.shop.subscription')
                                </li>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
  <!--/.Navbar-->
  
<script>
    $(document).ready(function () {
    $('.first-button').on('click', function () {
    $('.animated-icon1').toggleClass('open');
    });
    $('.second-button').on('click', function () {
    $('.animated-icon2').toggleClass('open');
    });
    $('.third-button').on('click', function () {
    $('.animated-icon3').toggleClass('open');
    });
});
</script>


<div class="d-flex mb-3 border-bottom shadow-lg navbar sticky-top navbar-light bg-white">
    <div class="container">
        <div class="column" style="margin-bottom:-5px">
            <div class="row">
                <p style="margin-right:10px;" class="my-0 text-dark mr-md-auto font-weight-normal z-40 ml-0 mt-0 bg-gray-400">
                    <a href="{{ route('auto-parts') }}">
                        <img src="/img/icon.png" style="margin-top:9px" width="90px">
                    </a>
                </p>

                <div class="row" style="margin-left:40px;margin-top:19px">
                    @include('includes.order_call')
                </div>

                <div class="phone-sm column header-contacts" style="margin-top:5px;margin-left: 40px;">
                    <div>
                        <a href="tel:+79169174630" class="textAddress" style="color:black;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill phone-img" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                            </svg>
                            +7 (916) 917-46-30
                        </a>
                    </div>
                    <div>
                        <a href="mailto:lemmaauto@gmail.com" style="color: black">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                            </svg>
                            lemmaauto@gmail.com
                        </a>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-alarm-fill phone-img" viewBox="0 0 16 16">
                            <path d="M6 .5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H9v1.07a7.001 7.001 0 0 1 3.274 12.474l.601.602a.5.5 0 0 1-.707.708l-.746-.746A6.97 6.97 0 0 1 8 16a6.97 6.97 0 0 1-3.422-.892l-.746.746a.5.5 0 0 1-.707-.708l.602-.602A7.001 7.001 0 0 1 7 2.07V1h-.5A.5.5 0 0 1 6 .5zm2.5 5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5zM.86 5.387A2.5 2.5 0 1 1 4.387 1.86 8.035 8.035 0 0 0 .86 5.387zM11.613 1.86a2.5 2.5 0 1 1 3.527 3.527 8.035 8.035 0 0 0-3.527-3.527z"/>
                        </svg>
                        пн-пт 11:00 - 20:00
                    </div>
                </div>
                <div class="header-address">
                    <p style="font-size: 12px; margin-left:14px">
                        <strong>Главный офис:</strong>
                        <br>
                        ООО "Лемма-авто", 108814,<br>
                        город Москва, поселение Сосенское,<br>
                        поселок Коммунарка, Бачуринская улица,<br>
                        дом 317Ю, офис 006A</p>
                </div>
                <div>
                    <div class="dropdown-item" style="margin-top: 10px">
                        <a href="{{ route('faq') }}">
                            <img style="" src="https://img.icons8.com/external-bearicons-blue-bearicons/64/000000/external-faq-frequently-asked-questions-faq-bearicons-blue-bearicons-1.png"/>
                        </a>
                    </div>
                </div>
            </div>

            <div style="margin-top:10px">
                @if (Route::has('login'))
                    <div class="enter-small">
                        @auth
                            <a href="{{ url('/dashboard') }}" style="color:black;margin-right:6px">
                                <svg xmlns="http://www.w3.org/2000/svg" style="margin-top:-6px" width="16" height="16" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                    <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z"/>
                                </svg>
                                Личный кабинет
                            </a>

                            @if(Auth::user()->hasRole('user'))
                                <a href="{{ route('cart.index') }}" style="color:black;margin-top:4px">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="margin-top:-6px" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                    </svg>
                                    Корзина
                                    ({{ Cart::instance('default')->count() }})
                                </a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" style="color:black;margin-right:6px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" style="margin-top:-4px" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                                    <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                </svg>
                                Вход
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" style="color:black;margin-top:4px">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="margin-top:-4px" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                    </svg>
                                    Регистрация
                                </a>
                            @endif
                        @endif
                    </div>
                @endif
            </div>
        </div>

        @if (Route::has('login'))
            <div class="enter-big">
                @auth
                    <div class="column text-right">
                        <div>
                            <a href="{{ url('/dashboard') }}" style="color:black;margin-right:6px">
                                <svg xmlns="http://www.w3.org/2000/svg" style="margin-top:-6px" width="16" height="16" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                    <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z"/>
                                </svg>
                                Личный кабинет
                            </a>
                        </div>

                        <div>
                            @if(Auth::user()->hasRole('user'))
                                <a href="{{ route('cart.index') }}" style="color:black;">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="margin-top:-6px" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                    </svg>
                                    Корзина
                                    ({{ Cart::instance('default')->count() }})
                                </a>
                            @endif
                        </div>
                    </div>
                @else
                    <div class="column text-right">
                        <div style="margin-top:-4px">
                            <a href="{{ route('login') }}" style="color:black;margin-right:6px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" style="margin-top:-4px" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                                    <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                </svg>
                                Вход
                            </a>
                        </div>

                        <div>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" style="color:black;">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="margin-top:-4px" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                    </svg>
                                    Регистрация
                                </a>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        @endif
    </div>
</div>

<style>
    #menu-small {
        display: none;
    }

    .autoparts-small {
        display: none;
    }

    .header-small {
        display: none;
    }

    .button-small {
        display: none;
    }

    @media (max-width: 1200px) {
        .searchTop {
            display: none;
        }
        .searchTopEmpty {
            display: block;
        }
        .header-big {
            display: none;
        }
        .header-small {
            display: block;
        }
    }

    @media (max-width: 1000px) {
        .autoparts-big {
            display: none;
        }
        .autoparts-small {
            display: block;
        }
        .header-advs {
            display: none;
        }
        .advertisements {
            display: none;
        }
    }

    @media (max-width: 846px) {
        #menu-big {
            display: none;
        }
        #menu-small {
            display: block;
        }
    }

    @media (max-width: 800px) {
        .advertisements {
            display: none;
        }
        .order-call {
            display: block;
        }
    }

    .order-call {
        display: none;
    }

    .enter-small {
        display: none;
    }

    @media (max-width: 768px) {
        #menu-heading {
            display: none;
        }
        .button-big {
            display: none;
        }
        .button-small {
            display: block;
        }
        .enter-big {
            display: none;
        }
        .enter-small {
            display: block;
        }
    }

    @media (max-width: 562px) {

    }
    @media (max-width: 500px) {
        .cart {
            display:none;
        }
    }

    @media (max-width: 516px) {
        .phone-sm {
            display: none;
        }
        .phone-sm {
            font-size: 14px;
        }
    }
    @media (max-width: 412px) {
        .phone-sm {
            font-size: 12px;
        }
        .menu-b {
            margin-right: 4px;
        }
    }
    @media (max-width: 394px) {
        .phone-img {
            display: none;
        }
    }
</style>
