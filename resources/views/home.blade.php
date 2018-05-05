@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Página Home</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ( $bet_groups as $bet_group )
                        {{-- list groups --}}
                        <p>{{ $bet_group->name }}</p>
                    @endforeach

                    <a class="btn btn-link" href="{{ route('cbg') }}">
                        Criar grupo de apostas
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
