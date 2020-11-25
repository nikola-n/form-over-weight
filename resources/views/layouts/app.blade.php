<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('_includes.head')
<body>

    @include('_includes.navigation')

    @yield('header')

    <main class="container mx-auto">
        @yield('content')
    </main>

@livewireScripts
@include('_includes.footer')
</body>
</html>
@stack('scripts')
