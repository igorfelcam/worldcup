<template lang="html">
    <div class="form-group">
        <div>
            <input
                class="form-control"
                name="searchfriend"
                type="text"
                placeholder="Nome de usuário do amigo"
                v-model="friend"
                @keyup="searchFriends()"
                required
                autofocus
            />

            <div v-if="results_friends && results_friends.length">
                <div class="text-center"
                    v-for="friend in results_friends"
                >
                    <div class="list-results"
                        @click="getFriend( friend.name )"
                    >
                        <span>{{ friend.name }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="compare"
            v-if="user_friend"
        >
            <div class="row compare-teams">
                <div class="teams bets-us">
                    {{ user_username }}
                </div>
                <div class="teams bets-us">
                    {{ user_friend }}
                </div>
            </div>
            <div class="row item"
                v-for="bet in results_bets"
            >
                <p>{{ bet.tipo }}</p>
                <div class="compare-teams">
                    <div class="teams">
                        {{ bet.teama }}
                        <img width="20" height="20" :src="bet.flaga" alt="">
                        <div class="compare-teams-item">{{ bet.betaa }}</div>

                        <span>&#10006;</span>

                        <div class="compare-teams-item">{{ bet.betba }}</div>
                        <img width="20" height="20" :src="bet.flagb" alt="">
                        {{ bet.teamb }}
                    </div>
                    <div class="teams">
                        {{ bet.teama }}
                        <img width="20" height="20" :src="bet.flaga" alt="">
                        <div class="compare-teams-item">{{ bet.betab }}</div>

                        <span>&#10006;</span>

                        <div class="compare-teams-item">{{ bet.betbb }}</div>
                        <img width="20" height="20" :src="bet.flagb" alt="">
                        {{ bet.teamb }}
                    </div>
                </div>
                <hr>
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
            friend: '',
            results_friends: [],
            user_id: false,
            user_username: null,
            user_friend: null,
            results_bets: []
        }
    },
    methods: {
        // search friends
        searchFriends () {
            if ( this.friend.length > 0 ) {
                Vue.axios.get( '/api/comparefriend/' + this.friend )
                // Vue.axios.get( '/worldcup/api/comparefriend/' + this.friend )
                    .then( response => {
                        // friends
                        this.results_friends = response.data.friends.data
                        // user id
                        this.user_id = response.data.user.id
                    })
                    .catch( e => {
                        console.log( "Error: " + e )
                    })
            }
            else {
                this.results_friends = null
            }
        },
        getFriend ( username ) {
            console.log( username );

            this.user_friend = username

            this.friend = null
            this.results_friends = null

            Vue.axios.get( '/api/getcompare/' + username )
            // Vue.axios.get( '/worldcup/api/getcompare/' + username )
                .then( response => {
                    // friends
                    this.results_bets = response.data.friends
                    this.user_username = response.data.user.username

                    // console.log(this.results_bets);
                    // user id
                    // this.user_id = response.data.user.id
                })
                .catch( e => {
                    console.log( "Error: " + e )
                })
        }
    }
}
</script>

<style lang="css">
    .list-results {
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
    .item { padding: 0 1em; }
</style>
