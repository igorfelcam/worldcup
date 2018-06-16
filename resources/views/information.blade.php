@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-inf">

            <p class="text-center fntsz18"><b>App Web para apostas WorldCup 2018</b></p>

            <div class="fntsz12">
                <div class="mag-2">
                    <div class="text-center"><b>Regras de pontuação:</b></div>
                    <div class="text-center">3 pontos para acertos exatos dos placares da partida (acerto - A)</div>
                    <div class="text-center">1 ponto para acertos da situação do jogo mas com resultados diferentes (quase - Q)</div>
                </div>

                <hr>

                <div class="mag-2">
                    <div class="text-center"><b>5 maiores pontuadores</b></div>
                    <div class="top-five">
                        @php $aux = 0; @endphp
                        <div class="pos"></div>
                        <div class="us-top"></div>
                        <div class="sc-top fntsz10">A</div>
                        <div class="sc-top fntsz10">Q</div>
                        <div class="sc-top fntsz10"><b>T</b></div>
                        @foreach ( $top_five as $top )
                            <div class="pos"><b>{{ $aux = $aux + 1 }}º</b></div>
                            <div class="us-top">{{ $top->user_name }}</div>
                            <div class="sc-top">{{ $top->hit_the_mark }}</div>
                            <div class="sc-top">{{ $top->almost_hit }}</div>
                            <div class="sc-top"><b>{{ $top->total_score }}</b></div>
                        @endforeach
                    </div>
                </div>

                <hr>

                <div class="text-justify mag-2">
                    Este app web foi feito para que você possa apostar nos resultados dos jogos da copa do mundo
                    de 2018, com a possibilidade de reunir amigos em grupos de apostas e, de forma simples e divertida,
                    competir na classificação a partir da pontuação dos resultados.
                </div>

                <p>
                    <p>
                        <p class="text-center">Não perca tempo e convide seus amigos!</p>
                    </p>
                </p>

                <hr>

                <p class="text-justify mag-2">
                    Projeto desenvolvido para disciplina Gerência de Projetos, do curso de Sistemas de Informação da FACCAT.
                    A finalidade é educacional, para desenvolver aspectos de organização e estrutura de um projeto completo.
                </p>

                <hr>

                <p class="text-center">
                    <a class="badge badge-light pad-lk" href="https://github.com/IgorCamargo/worldcup" target="_blank">
                        <img width="16" height="16" src="{{ asset('img/GitHub-Mark-32px.png') }}" alt="GitHub">
                        WorldCup
                    </a>
                </p>
            </div>

        </div>
    </div>
@endsection
