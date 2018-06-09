@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cadastrar resultados</div>
                <div class="panel-body">

                    @foreach ( $matches_soccers as $match )

                        <form class="panel-matches" method="post" action="{{ route( 'admResults' ) }}">
                            {{ csrf_field() }}
                            <p>{{ $match->match_id }} | {{ $match->match_date }} - {{ $match->type_name }}</p>
                            <div class="panel-matches-mat">
                                <span>
                                    {{ $match->team_a }}
                                </span>
                                <span>
                                    <img width="28" height="28" src="{{ $match->flag_a }}" alt="">
                                </span>
                                <span>
                                    <input class="form-control goal"
                                        type="text"
                                        name="team_first"
                                        value="{{ $match->bet_first_team_goals }}"
                                    >
                                </span>
                                <span>
                                    &#10006;
                                </span>
                                <span>
                                    <input class="form-control goal"
                                        type="text"
                                        name="team_second"
                                        value="{{ $match->bet_second_team_goals }}"
                                    >
                                </span>
                                <span>
                                    <img width="28" height="28" src="{{ $match->flag_b }}" alt="">
                                </span>
                                <span>
                                    {{ $match->team_b }}
                                </span>
                            </div>

                            <input class="form-control goal"
                                type="hidden"
                                name="match_id"
                                value="{{ $match->match_id }}"
                            >
                            <input class="form-control goal"
                                type="hidden"
                                name="match_date"
                                value="{{ $match->match_date }}"
                            >

                            <div class="text-center ranking-item">
                                <input type="submit" class="btn btn-success" value="Gravar">
                            </div>
                        </form>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
