<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('_includes.head')
<body>
<div id="app">

    @include('_includes.navigation')

    @yield('header')

    <main>
        @yield('content')
    </main>

</div>
@include('_includes.footer')
</body>
</html>
@stack('scripts')
