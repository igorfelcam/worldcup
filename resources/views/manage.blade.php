@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">Gerenciar grupo de apostas</div>

                {{-- <div class="panel-body">
                    <div class="panel-body">
                        <div class="form-group">
                            <betsgroups></betsgroups>
                        </div>
                    </div>
                </div> --}}

                <div class="panel-body no-pad">
                    {{-- @foreach ( $bet_groups as $group ) --}}
                        <!--<div class="panel-groups">
                            {{-- <p>{{ $group->name }}</p> {{-- adicionar amigos | excluir | renomear --}}
                            <div class="item-groups">{{-- $group->name --}}</div> {{-- adicionar amigos | excluir | renomear --}}
                            {{-- <a href="#" class="item-groups text-right">
                                Adicionar amigos
                            </a> --}}
                            <div class="item-groups text-right">
                                <input type="text"
                                    class="form-control"
                                    name=""
                                    value=""
                                    {{-- v-model="adc_friend" --}}
                                    {{-- @keyup="searchAdcFriend" --}}
                                    placeholder="Adicionar amigos"
                                >
                            </div>
                        </div>
                        <div class="" v-for="friend in results_adc_friends">
                            <div class="panel-groups adc_friends">
                                <div class="item-groups">@{{ friend.name }}</div>
                                <div class="item-groups">
                                    Adicionar
                                </div>
                            </div>
                        </div>
                        <hr></hr>-->
                    {{-- @endforeach --}}


                    <managegroup :groups="{{ $bet_groups }}"></managegroup>


                </div>

            </div>
        </div>
    </div>
</div>
@endsection
