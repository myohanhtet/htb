<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-warning">
    <div class="container px-5">
        <a class="navbar-brand" href="#!"><b>Htantabin </b>Monastery</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="{{ route('frontend.home') }}">မူလစာမျက်နှာ</a></li>
{{--                <li class="nav-item"><a class="nav-link" href="#!">About</a></li>--}}
                    <li class="nav-item"><a class="nav-link {{ Request::is('donors') ? 'active' : '' }}" href="{{ route('frontend.donors') }}">အလှူရှင်များ</a></li>

{{--                @if (Route::has('login') && Auth::check())--}}
{{--                    <div class="top-right links">--}}
{{--                        <li class="nav-item"><a class="nav-link" href="{{ url('/admin/dashboard') }}">Dashboard</a></li>--}}
{{--                    </div>--}}
{{--                @elseif (Route::has('login') && !Auth::check())--}}
{{--                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>--}}
{{--                @endif--}}
            </ul>

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                @if (Route::has('login') && Auth::check())
                                    <div class="top-right links">
                                        <li class="nav-item"><a class="nav-link" href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                                    </div>
                                @elseif (Route::has('login') && !Auth::check())
                                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                                @endif
            </ul>

        </div>
    </div>
</nav>
