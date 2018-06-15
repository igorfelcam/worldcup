@php
    // date now
    date_default_timezone_set('America/Sao_Paulo');
    $date_now = date('d-m-Y H:i');
@endphp

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading form-inline">
                    Faça sua aposta!
                </div>
                <div class="panel-body">
                <button @click="isActiveHide = !isActiveHide" class="btn btn-hide">
                    <span v-if="isActiveHide == true">Mostrar</span>
                    <span v-else>Esconder</span>
                    jogos anteriores
                </button>
                    @foreach ( $matches_soccers as $match )
                        @php
                            $date = str_replace( '-', ' ', $match->match_date );
                            $date = str_replace( '/', '-', $date );
                            $date = date( 'd-m-Y H:i', strtotime( '+240 minute', strtotime( $date )));
                        @endphp
                        <div class="panel-matches"
                        @if ( $date < $date_now )
                                v-bind:class="{ hide_match: isActiveHide }"
                            @endif
                        >
                            <p>
                                @php
                                    $dd = substr( $match->match_date, 0, 2 );
                                    $mm = substr( $match->match_date, 3, 2 );
                                    $yy = substr( $match->match_date, 6, 4 );
                                    $hh = substr( $match->match_date, 13, 2 );
                                    $mi = substr( $match->match_date, 16, 2 );
                                @endphp
                                <counter :matchdate="{ date: {{ $dd }}, month: {{ $mm }}, year: {{ $yy }}, hour: {{ $hh }}, minute: {{ $mi }} }"></counter>
                                {{ $dd }}/{{ $mm }}/{{ $yy }} {{ $hh }}:{{ $mi }} | {{ $match->type_name }}
                            </p>
                            <div class="panel-matches-mat">
                                <span>
                                    {{ $match->team_a }}
                                </span>
                                <span>
                                    <img width="28" height="28" src="{{ $match->flag_a }}" alt="">
                                </span>
                                <span>
                                    <input class="form-control goal"
                                        id="{{ $match->match_id }}"
                                        type="text"
                                        name="team_first"
                                        @keyup="enterBet"
                                        value="{{ $match->bet_first_team_goals }}"
                                    >
                                </span>
                                <span>
                                    &#10006;
                                </span>
                                <span>
                                    <input class="form-control goal"
                                        id="{{ $match->match_id }}"
                                        type="text"
                                        name="team_second"
                                        @keyup="enterBet"
                                        value="{{ $match->bet_second_team_goals }}"
                                    >
                                </span>
                                <span>
                                    <img width="28" height="28" src="{{ $match->flag_b }}" alt="">
                                </span>
                                <span>
                                    {{ $match->team_b }}
                                </span>
                                <span>
                                    <b>{{ $match->score }}</b>
                                </span>
                            </div>

                            @if ( $date < $date_now )
                                <div class="panel-matches-mat padtop-1">
                                    <span>
                                        <div>
                                            {{ $match->a_first_team_goals }}
                                        </div>
                                    </span>
                                    <span>
                                        x
                                    </span>
                                    <span>
                                        <div>
                                            {{ $match->b_second_team_goals }}
                                        </div>
                                    </span>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
