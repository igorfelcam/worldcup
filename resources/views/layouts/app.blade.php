<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', '') }}</title>

    <!-- ico -->
    <link rel="icon" href="{{ asset('img/favicon.ico') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">


        <nav class="navbar navbar-default navbar-light bg-light justify-content-between">
            {{-- <a class="navbar-brand">Navbar</a> --}}

            <span class="navbar-brand padding-img">
                <img height="28" src="{{ url('img/ico-worldcup.png') }}" alt="">
            </span>
            {{-- Branding Image --}}
            @if ( Auth::guest() )
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', '') }}
                </a>
                <div class="nav-items-new">
                    <a href="{{ route('register') }}">
                        Criar conta
                    </a>
                </div>

            @else
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ Auth::user()->username }}
                </a>

                <div class="menu-select">
                    {{--display: flex;
    height: 100%;
    background-color: red;
    width: 5em;
    font-size: 18px;  --}}
                    <span @click="showMenu" class="select menu-icon">
                        &#9776;
                    </span>
                </div>

            @endif


        </nav>

        @if ( !Auth::guest() )
            <div class="sidenav" v-bind:class="{ show: showNow }">
                <a href="#" class="closebtn" @click="showMenu">
                    {{-- &times; --}}
                    &#10006;
                </a>
                <hr></hr>
                <span>Pontuação</span>
                <a href="#">Resultados gerais</a>
                <a href="#">Comparar resultados</a>
                <hr></hr>
                <span>Grupos</span>
                <a href="#">Ver ranking</a>
                <a href="#">Buscar grupo</a>
                <a href="#">Criar grupo</a>
                <hr></hr>
                <a href="#">Sair</a>
            </div>
        @endif


        <!--<nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    {{-- Collapsed Hamburger --}}
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <span class="navbar-brand padding-img">
                        <img height="28" src="{{ url('img/ico-worldcup.png') }}" alt="">
                    </span>
                    {{-- Branding Image --}}
                    @if ( Auth::guest() )
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', '') }}
                        </a>
                    @else
                        <a class="navbar-brand" href="{{ url('/home') }}">
                            {{ Auth::user()->username }}
                        </a>
                    @endif
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    {{-- Left Side Of Navbar --}}
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    {{-- Right Side Of Navbar --}}
                    <ul class="nav navbar-nav navbar-right">
                        {{-- Authentication Links --}}
                        @if ( Auth::guest() )
                            {{-- <li><a href="{{ route('login') }}">Login</a></li> --}}
                            <li><a href="{{ route('register') }}">Criar conta</a></li>
                        @else
                            <li class="dropdown">
                                {{-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a> --}}

                                {{-- <ul class="dropdown-menu" role="menu"> --}}
                                    {{-- <li> --}}
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Sair
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    {{-- </li> --}}
                                {{-- </ul> --}}
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>-->




        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
