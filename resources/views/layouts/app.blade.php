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

        <div v-bind:class="{ checkok: check }">
            <img class="checkokimg"
                v-bind:class="{ checkokimgshow: check }"
                src="{{ url( '/img/check-ok.gif' ) }}" alt="">
        </div>

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
                    <a class="color-inh" href="{{ route('register') }}">
                        Criar conta
                    </a>
                </div>
            @else
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ Auth::user()->username }}
                </a>
                <div class="menu-select-header">
                    <div class="menu-select">
                        <span class="neon-score">
                            @if ( isset( $total_score ) )
                                {{ $total_score }}
                            @endif
                        </span>
                        <span @click="showMenu" class="select menu-icon">
                            @if (( isset( $notifications )) && ( $notifications > 0 ))
                                <div class="notf">{{ $notifications }}</div>
                            @else
                                &#9776;
                            @endif
                        </span>
                    </div>
                </div>
            @endif
        </nav>

        @if ( !Auth::guest() )
            <div class="sidenav" v-bind:class="{ show: showNow }">
                <a href="#" class="closebtn" @click="showMenu">
                    &#10006;
                </a>
                <div class="group-menu-item">
                    @if (( isset( $notifications )) && ( $notifications > 0 ))
                        <a href="{{ route( 'notf' ) }}"><b>{{ $notifications }}</b> Solicitações pendentes</a>
                    @endif
                    <a href="{{ route( 'home' ) }}">Apostas e resultados</a>
                    <a href="{{ route( 'betgroup' ) }}">Ver ranking no grupo</a>
                    <a href="{{ route( 'compare' ) }}">Comparar com amigo</a>
                    @if (( isset( $bet_groups )) && ( !is_null( $bet_groups )))
                        <a href="{{ route( 'mbg' ) }}">Gerenciar grupos</a>
                    @endif
                    <a href="{{ route( 'sbg' ) }}">Buscar por grupo</a>
                    <a href="{{ route( 'cbg' ) }}">Criar grupo de apostas</a>
                    <a href="{{ route( 'logout' ) }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        Sair
                    </a><form id="logout-form" action="{{ route( 'logout' ) }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                </div>
            </div>
        @endif

        @yield('content')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
