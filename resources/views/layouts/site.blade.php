<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="yandex-verification" content="2791249d4cd41e81" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('description')
    <title>@yield('title-block') - Лемма-авто</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico" />


    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>


    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/android-chrome-512x512.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="120x120" href="/120-120.png">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@1.2.3/dist/trix.css">
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(82354153, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            ecommerce:"dataLayer"
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/82354153" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    <meta name="yandex-verification" content="2791249d4cd41e81" />
</head>

<body>
@include('includes.header')
<div class="container">
    <div class="site-index">
        <div class="jumbotron blog">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-12">
                    <p class="main-address">ООО "Лемма-авто", 108814,<br>
                        город Москва, поселение Сосенское,<br>
                        поселок Коммунарка, Бачуринская улица,<br>
                        дом 317Ю, офис 006A</p>
                    <div class="header-big">
                        <h1 class="spacePromo" style="margin-top:10px;font-weight:600">Автозапчасти</h1>
                    </div>
                    <div class="header-small">
                        <h1 class="spacePromo" id="spacePromo" style="margin-top:10px;font-weight:600">Авто-<br>запчасти</h1>
                    </div>
                    <h2 class="lead" style="margin-top: -6px">на иномарки</h2>
                    <h2 class="lead" style="margin-top: -6px">по каталожному номеру</h2>
                    @include('includes.contact_button')
                    @include('includes.messages_errors')
                    <div class="phone">
                        <a href="tel:+79169174630" class="textAddress" style="color: blue">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                            </svg>
                            +7 (916) 917-46-30
                        </a><br>
                        <a href="mailto:lemmaauto@gmail.com" style="color: white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                            </svg>
                            lemmaauto@gmail.com
                        </a>
                    </div>
                </div>
                <div class="header-advs col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 rounded-lg">
                    <div class="">
                        <ul>
                            <li style="margin-bottom: 20px; list-style: none">
                                <h4 style="font-weight: 500; color: white; padding-top: 20px">Помощь в подборе запчастей</h4>
                            </li>
                            <li style="margin-bottom: 20px; list-style: none">
                                <h4 style="font-weight: 500; color: white;">Доставка крупногабаритных заказов</h4>
                            </li>
                            <li class="worldWideDelivery" style="margin-bottom: 20px; list-style: none">
                                <h4 style="font-weight: 500; color: white;">Самовывоз из офиса в Москве</h4>
                            </li>
                            <li class="worldWideDelivery" style="margin-bottom: 20px; list-style: none">
                                <h4 style="font-weight: 500; color: white;">Доставка в города России и страны СНГ</h4>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="rounded-lg col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <!--<div style="background-color: rgba(0,0,0,0.5)" class="rounded-lg">-->
                    <div class="lastPosts" style="padding: 5px">
                        <p class="text-right" style="font-size:18px;color:white;margi-bottom:-10px">Статьи в блоге</p>
                        @include('includes.posts-slider')
                    </div>
                    <!--</div>-->
                    <!--<a href="#">-->
                    <!--    <p style="font-size:18px;font-weight:600;text-align:right;margin-top:20px">-->
                    <!--        Каталог расходных материалов-->
                    <!--    </p>-->
                    <!--</a>-->
                    <div class="flash1"></div>
                </div>
            </div>
            <div class="flash"></div>
        </div>
        <div class="body-content">
            @include('includes.messages_success')
            @yield('content')
        </div>
    </div>
    @include('includes.footer')
</div>

<style>
    @media (max-width: 500px) {
        .main-address {
            display:none;
        }
        #spacePromo {
            font-size: 40px;
        }
        .lead {
            font-size: 16px;
        }
    }
</style>
<div id='app'></div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</body>
</html>
