<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="yandex-verification" content="2791249d4cd41e81" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title-block') - Лемма-авто</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@1.2.3/dist/trix.css">

</head>

<body>
    @include('includes.header')
    <div class="container">
        <div class="site-index">
            <div class="body-content">
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                        <livewire:user.blog.cats />
                    </div>

                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                        @include('includes.blog.search')
                        <livewire:user.blog.tags />

                        @yield('content')
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                        <div class="advertisements" style="margin-top: 50px">
                            <livewire:user.advertisements.advertisements />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('includes.footer')
    </div>

    <div id='app'></div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
