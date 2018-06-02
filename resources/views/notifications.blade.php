@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading form-inline">
                    Solicitações pendentes
                </div>

                {{-- <div class="panel-body">
                    @foreach ( $details_notifications as $ntf )
                        <p>{{ $ntf->username }} | {{ $ntf->group_name }}</p>
                    @endforeach
                    @php
                        echo $details_notifications;
                    @endphp
                </div> --}}

                <notifications :notifications="{{ $details_notifications }}"></notifications>

            </div>
        </div>
    </div>
</div>
@endsection
