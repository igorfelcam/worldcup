@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                {{-- <div class="panel-heading form-inline">
                    Página Home
                </div> --}}
                {{-- <div class="panel-body">
                    <betsgroups></betsgroups>

                    <a class="btn btn-link" href="{{ route('cbg') }}">
                        Criar grupo de apostas
                    </a>
                </div> --}}

                <div class="panel-heading form-inline">
                    Faça sua aposta!
                </div>
                <div class="panel-body">
                    @foreach ( $matches_soccers as $match )

                        <div class="panel-matches">
                            <p>{{ $match->match_date }} - {{ $match->type_name }}</p>
                            <div class="panel-matches-mat">
                                <span>
                                    {{ $match->team_a }}
                                </span>
                                <span>
                                    <img width="28" height="28" src="{{ $match->flag_a }}" alt="">
                                </span>
                                <span>
                                    <input class="form-control goal" type="text" name="" value=""><!--LIMITAR TAMANHO E VALIDAR-->
                                </span>
                                <span>
                                    &#10006;
                                </span>
                                <span>
                                    <input class="form-control goal" type="text" name="" value="10">
                                </span>
                                <span>
                                    <img width="28" height="28" src="{{ $match->flag_b }}" alt="">
                                </span>
                                <span>
                                    {{ $match->team_b }}
                                </span>
                                <span>
                                    3
                                </span>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
