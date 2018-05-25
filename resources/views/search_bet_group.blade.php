@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Buscar grupo de apostas</div>
                <div class="panel-body">
                    {{-- <form class="form-horizontal" method="POST" action="{{ route('cbg') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('namegroup') ? ' has-error' : '' }}">
                            <label for="namegroup" class="col-md-4 control-label">Nome do grupo</label>

                            <div class="col-md-6">
                                <input id="namegroup" type="text" class="form-control" name="namegroup" value="{{ old('namegroup') }}" required autofocus>

                                @if ($errors->has('namegroup'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('namegroup') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Criar
                                </button>
                            </div>
                        </div>
                    </form> --}}

                    <div class="panel-body">
                        <div class="form-group">
                            <betsgroups></betsgroups>
                        </div>
                    </div>

                </div>

                {{-- <div class="panel-footer">
                    <div class="text-right">
                        <a href="{{ url('notGroup') }}">...ou criar grupo depois</a>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>
</div>
@endsection
