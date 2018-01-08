<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <header>
        <nav class="blue">
            <div class="nav-wrapper">
                <a href="{{ url('/') }}" class="brand-logo">
                    {{ config('app.name', 'MobileAudit') }}
                </a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <!-- Right Side Of Navbar -->
                @include('layouts.nav')
                <ul class="side-nav fixed" id="mobile-demo">
                    @yield('menu')
                </ul>
            </div>
        </nav>


    </header>
    <main>
        @yield('content')
    </main>
    {{--<footer class="page-footer orange">--}}
    {{--<div class="footer-copyright">--}}
    {{--<div class="container">--}}
    {{--Made by <a class="orange-text text-lighten-3" href="http://ya.ru">MobileAudit</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</footer>--}}
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/materialize.min.js') }}"></script>
</body>
</html>