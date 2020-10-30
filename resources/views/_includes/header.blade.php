<header class="home p-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-5">
                <h1 class="text-center text-white title">
                    <span style="background: gray; opacity: 0.7;" class="p-2 rounded"> {{ $title ?? ''}}</span></h1>
                <h5 class="text-uppercase text-white text-center subtitle">
                    <span class="bg-secondary p-1" style="opacity: 0.7;">{{ $subtitle ?? '' }}</span>
                </h5>
                <div class="buttons text-center">
                    @guest
                        <a class="btn btn-info" href="{{ route('register') }}">{{ $join_community ?? ''}}</a>
                    @endguest
                    <a class="btn btn-danger" href="{{ route('programs.index') }}">{{ $schedule_program ?? '' }}</a>
                </div>
            </div>
        </div>
    </div>
</header>
