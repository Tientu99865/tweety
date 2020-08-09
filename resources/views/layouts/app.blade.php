<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{asset('')}}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <section class="px-8 py-4 mb-6">
        <header class="container mx-auto">
            <img src="images/logo/logo.svg" alt="logo">
        </header>
    </section>
    <section class="px-8">
        <main class="mx-auto">
            <div class="lg:flex lg:justify-between">
                {{--        sidebar-left--}}
                @if(auth()->check())
                    <div class="lg:w-32">
                        @include('_sidebar-links')
                    </div>
                @endif

                {{--content--}}
                <div class="lg:flex-1 lg:mx-10" style="max-width: 700px">

                    @yield('content')

                </div>

                {{--        sidebar-right--}}
                @if(auth()->check())
                    <div class="lg:w-1/6 bg-blue-100 p-4 rounded-lg" style="height: fit-content;">
                        @include('_friend-list')
                    </div>
                @endif
            </div>
        </main>
    </section>
</div>
</body>
</html>
