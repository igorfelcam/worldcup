@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading form-inline">
                    Página Home
                </div>

                <div class="panel-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif --}}

                    <betsgroups></betsgroups>

                    <a class="btn btn-link" href="{{ route('cbg') }}">
                        Criar grupo de apostas
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
