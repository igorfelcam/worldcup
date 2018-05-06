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
                        <a>Enviar convite</a>
                        <a>Sair do grupo</a>
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
            results_groups: []
        }
    },
    methods: {
        // search bets group in realtime
        searchBetsGroups () {
            // console.log(this.group);
            if ( this.group.length > 0 ) {
                Vue.axios.get( '/api/search/' + this.group )
                    .then( response => {
                        // console.log( response.data.groups.data );
                        this.results_groups = response.data.groups.data
                    })
                    .catch( e => {
                        console.log( e )
                    })
            }
            else {
                this.results_groups = null
            }
        }
    }
}
</script>

<style lang="css">
</style>
