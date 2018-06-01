<template lang="html">
    <div class="form-group">
        <div>
            <!-- <input
                class="form-control"
                name="searchfriend"
                type="text"
                placeholder="Nome de usuário do amigo"
                v-model="friend"
                @keyup="searchFriends()"
                required
                autofocus
            /> -->

            <div v-if="groups != null" class="">

                <div v-for="group in groups" >
                    <div class="panel-groups">
                        <div class="item-groups">
                            {{ group.name }}
                        </div>
                        <div class="item-groups text-right">
                            <input type="text"
                            class="form-control"
                            name=""
                            v-model="friend[ group.name ]"
                            @keyup="searchFriends( group.name )"
                            placeholder="Buscar amigos"
                            >
                        </div>
                    </div>

                    <!-- NÃO ESTÁ ATUALIZANDO FOR NA HORA -->
                    <!-- **** AJUSTAR **** -->
                    {{ results_friends[ group.name ] }}

                    <div class="row list-results text-center"
                        v-if="results_friends[ group.name ]"
                        v-for="friend in results_friends[ group.name ]"
                    >
                        <div class="col list-results-item">
                            <span>{{ friend.name }}</span>
                        </div>

                        <div class="col list-results-item-btn text-right">

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>

import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
Vue.use( VueAxios, axios )

export default {
    props: [ 'groups' ],
    data () {
        return {
            response: {},
            friend: [],
            results_friends: []
        }
    },
    methods: {
        // search friends
        searchFriends ( group ) {
            if ( this.friend[ group ] ) {
                Vue.axios.get( '/api/comparefriend/' + this.friend[ group ] )
                    .then( response => {
                        // friends
                        this.results_friends[ group ] = response.data.friends.data

                        console.log(this.results_friends[ group ]);
                        // user id
                        // this.user_id = response.data.user.id
                    })
                    .catch( e => {
                        console.log( "Error: " + e )
                    })
            }
            else {
                this.results_friends[ group ] = null
            }

            console.log(this.results_friends[ group ]);
        },
    }
}
</script>

<style lang="css">
    /* .list-results {
        display: flex;
        padding: 0.5em;
        margin: 0.5em;
        font-size: 14px;
        border: 1px solid #636b6f;
        border-radius: 4px;
        cursor: pointer;
    }
    .list-results:hover {
        background-color: #d0dce2;
    }
    .list-results span {
        width: 100%;
        user-select: none;
    }
    .bets-us {
        font-size: 12px;
        font-weight: bold;
    }
    .teams {
        width: 50%;
        text-align: center;
    }
    .compare {
        margin: 1em 0;
        padding-top: 0.5em;
        font-size: 10px;
        border-top: 1px solid #d3e0e9;
    }
    .compare-teams {
        display: flex;
        font-size: 10px;
    }
    .compare-teams-item {
        padding: 0 0.025em;
        display: inline-block;
    }
    .item { padding: 0 1em; } */
</style>
