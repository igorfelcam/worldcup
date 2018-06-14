@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-inf">

            <p class="text-center fntsz18"><b>App Web para apostas WorldCup 2018</b></p>

            <div class="fntsz12">
                <div class="mag-2">
                    <div class="text-center"><b>Regras de pontuação:</b></div>
                    <div class="text-center">3 pontos para acertos exatos dos placares da partida</div>
                    <div class="text-center">1 ponto para acertos da situação do jogo mas com resultados diferentes</div>
                </div>

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


                <p class="text-justify mag-2">
                    Projeto desenvolvido para disciplina Gerência de Projetos, do curso de Sistemas de Informação da FACCAT.
                    A finalidade é educacional, para trabalhar aspectos de organização e estruturação de um projeto completo.
                </p>

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
