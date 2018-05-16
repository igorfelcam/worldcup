<template lang="html">

    <div class="container">
        <input class=""
            name="searchgroup"
            type="text"
            placeholder="Buscar grupos"
            v-model="group"
            @keyup="searchBetsGroups()"
        />

        <div v-if="results_groups && results_groups.length">
            <div v-for="group in results_groups">
                <p>
                    {{ group.group_name }}
                    <span>
                        <a v-if="user_id == group.user_create">
                            <!-- user created group -->
                            <span>Convidar amigos</span>        <!-- link para a view de convidar amigos -->
                        </a>
                        <a v-else-if="group.user_participe == false && group.user_invite == false" v-on:click="enterGroup( group.group_id )">
                            <!-- user not participe and not sent solicitation of group -->
                            <span>Entrar</span>
                        </a>
                        <a v-else-if="group.user_participe == false && group.user_invite == true">
                            <!-- user don't partipe and solicited entry and don't participe -->
                            <!-- user request entry in group -->
                            <span>Solicitado</span>
                        </a>
                        <a v-else-if="group.user_participe == true && user_id != group.user_create" v-on:click="exitGroup( group.group_id )">
                            <!-- user participe and don't created the group -->
                            <span>Sair</span>
                        </a>
                    </span>
                </p>
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
    data () {
        return {
            response: {},
            group: '',
            results_groups: [],
            user_id: false
        }
    },
    methods: {
        // search bets group in realtime
        searchBetsGroups () {
            // console.log(this.group);
            if ( this.group.length > 0 ) {
                Vue.axios.get( '/api/search/' + this.group )
                    .then( response => {
                        // groups
                        this.results_groups = response.data.groups.data
                        // user id
                        this.user_id = response.data.user.id
                        // console.log( response.data.groups.data ) // todos os grupos
                        // console.log( response.data.user.id ) // usuário
                    })
                    .catch( e => {
                        console.log( "Error: " + e )
                    })
            }
            else {
                this.results_groups = null
            }
        },
        enterGroup ( group_id ) {
            // console.log( "here man!" + this.user_id + " group " + group_id );
            if ( this.user_id ) {
                Vue.axios.get( '/api/enterGroup/' + group_id + '/' + this.user_id )
                    .then( response => {
                        console.log( 'Solicited enter group' )
                    })
                    .catch( e => {
                        console.log( "Error: " + e )
                    })
            }
        },
        exitGroup ( group_id ) {
            // console.log( "here" + group_id );
            if ( this.user_id ) {
                Vue.axios.get( '/api/exitGroup/' + group_id + '/' + this.user_id )
                    .then( response => {
                        console.log( 'Exit group sucess' )
                    })
                    .catch( e => {
                        console.log( "Error: " + e )
                    })
            }
        }
    }
}
</script>

<style lang="css">
</style>
