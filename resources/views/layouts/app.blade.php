<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>

    <script src="{{ asset('/js/chat.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}
</head>
<body>
    <div id="app">
        <div class="tbg">
            <div class="theader">
                <nav class="navbar navbar-expand-md navbar-light bg-white">
                    <div class="container">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">

                            {{-- ヘッダー左 --}}
                            <ul class="navbar-nav mr-auto">
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" onClick="history.back()">
                                            <i class="far fa-arrow-alt-circle-left fa-2x" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                @endguest
                            </ul>

                            {{-- ロゴ --}}
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    <a class="navbar-brand" href="{{ url('/users') }}">
                                        <img src="https://worldvectorlogo.com/logos/tinder-1.svg" alt="Tinder Logo" title="Tinder Logo" style="width: 100px">
                                    </a>
                                </li>
                            </ul>

                           {{-- ヘッダー右 --}}
                            <ul class="navbar-nav ml-auto">
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a id="openSetting" class="nav-link" href="">
                                            <i class="fas fas fa-list-ul fa-2x"></i>
                                        </a>
                                    </li>
                            {{-- モーダル --}}
                            <div class="modal-container">
                                <div class="modal-body">
                                    <div id="closeSetting"></div>
                                    <div class="modal-content">

                                        <a class="nav-link" href="{{ url('/users') }}" style="text-decoration: underline">
                                                <i style="width:20px; height:20px;" class="far fa-grin-hearts" aria-hidden="true"></i>
                                            Let's match!</a>

                                        <a class="nav-link" href="{{ route('matches.index')}}" style="text-decoration: underline">
                                                <i style="width:20px; height:20px;" class="fa fa-comments" aria-hidden="true"></i>
                                            Chat</a>

                                        <a class="nav-link" href="" style="text-decoration: underline">
                                                <i style="width:20px; height:20px;" class="fas fa-search" aria-hidden="true"></i>
                                            Search events by conditions</a>

                                        <a class="nav-link" href="{{ route('events.index') }}" style="text-decoration: underline">
                                                <i style="width:20px; height:20px;" class="fas fa-icons" aria-hidden="true"></i>
                                            Event</a>

                                         <a class="nav-link" href="{{ route('users.notice') }}" style="text-decoration: underline">
                                                <i style="width:20px; height:20px;" class="far fa-envelope" aria-hidden="true"></i>
                                             Notice</a>

                                        <a class="nav-link" href="{{ route('users.showProfile') }}" style="text-decoration: underline">
                                                <i style="width:20px; height:20px;" class="far fa-address-card" aria-hidden="true"></i>
                                            Edit profile</a>

                                         <a class="nav-link" href="{{ url('/') }}" style="text-decoration: underline">
                                                <i style="width:20px; height:20px;" class="fas fa-fire-alt" aria-hidden="true"></i>
                                             Top page</a>

                                        <a class="nav-link" href="{{ route('logout') }}" style="text-decoration: underline"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="fas fa-file-export" aria-hidden="true"></i>
                                             Logout
                                         </a>
                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                             @csrf
                                         </form>


                                    </div>
                                </div>
                            </div>

                                @endguest
                        </ul>
                        </div>
                    </div>
                </nav>
            </div>

            @if (session('flash_message'))
                <div class="flash_message text-center">
                    <p><i class="fas fa-check"></i>  {{ session('flash_message') }}</p>
                </div>
            @endif

            <div class="tbgwrap">
                @yield('content')
            </div>
        </div>
    </div>
    <script>


    </script>
</body>
</html>
