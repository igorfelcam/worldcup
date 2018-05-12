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
                    {{ group.name }}
                    <span>
                        <a>
                            <span v-if="user_id == group.user_create_id">Convidar amigos</span>
                            <span v-else v-on:click="askInvite( group.id )">Solicitar convite</span>
                        </a>
                        <a>
                            <span v-if="user_id != group.user_create_id">Sair do grupo</span>
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

                        console.log( response.data.user_groups.data ); // groups user for list status

                        this.results_groups = response.data.groups.data
                        this.user_id = response.data.user
                    })
                    .catch( e => {
                        console.log( "Error: " + e )
                    })
            }
            else {
                this.results_groups = null
            }
        },
        askInvite ( group_id ) {
            // console.log( "here man!" + this.user_id + " group " + group_id );
            if ( this.user_id ) {
                Vue.axios.get( '/api/askinvite/' + group_id + '/' + this.user_id )
                    .then( response => {
                        console.log( 'sent invite' )
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
