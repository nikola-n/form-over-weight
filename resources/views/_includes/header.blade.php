<header class="home p-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-5">
                <h1 class="text-center text-white title">
                    <span style="background: gray; opacity: 0.7;" class="p-2 rounded"> {{ $title }}</span></h1>
                <h5 class="text-uppercase text-white text-center subtitle">
                    <span class="bg-secondary p-1" style="opacity: 0.7;">{{ $subtitle }}</span>
                </h5>
                <div class="buttons text-center">
                    <a class="btn btn-info" href="{{ route('register') }}">JOIN OUR COMMUNITY</a>
                    {{--                        <a class="btn btn-danger" href="{{ route('program.index') }}">SCHEDULE A PROGRAM</a>--}}
                </div>
            </div>
        </div>
    </div>
</header>
