@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <b>
                        @if ( $count_bet_groups == 1 )
                            Ranking - {{ $user_groups[0]->name }}
                        @else
                            Ranking
                        @endif
                    </b>
                </div>
                <div class="panel-body">
                    @if ( $count_bet_groups == 0 )
                        <p class="text-center fntsz26"><b>Ops!</b></p>
                        <p class="text-center">Você está sem grupo de aposta...</p>
                        <p class="text-center">Crie um agora mesmo clicando <a href="{{ route( 'cbg' ) }}">aqui</a></p>
                        <p class="text-center">Ou <a href="{{ route( 'sbg' ) }}">aqui</a> para buscar um grupo de apostas!</p>
                    @elseif ( $count_bet_groups == 1 )
                        <div class="ranking">
                            <div class="ranking-item ranking-item-us">Apostador</div>
                            <div class="ranking-item ranking-item-pt">Acertos</div>
                            <div class="ranking-item ranking-item-pt">Quase</div>
                            <div class="ranking-item ranking-item-pt"><b>Pontos</b></div>
                        </div>
                        @foreach ( $ranking as $key )
                            <div class="ranking color-blk">
                                <div class="ranking-item ranking-item-us">{{ $key->user_name }}</div>
                                <div class="ranking-item ranking-item-pt">{{ $key->hit_the_mark }}</div>
                                <div class="ranking-item ranking-item-pt">{{ $key->almost_hit }}</div>
                                <div class="ranking-item ranking-item-pt fntsz12"><b>{{ $key->total_score }}</b></div>
                            </div>
                        @endforeach
                    @else
                        @php
                            $json_user_groups = json_encode( $user_groups );
                        @endphp
                        <select-ranking
                            :user_groups="{{ $json_user_groups }}"
                            :ranking="{{ $ranking }}">
                        </select-ranking>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
