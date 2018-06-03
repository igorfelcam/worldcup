<template lang="html">
    <div class="">

        <div class="form-group">
            <select
                v-model="select_group"
                class="form-control"
            >
                <option disabled>Selecione o grupo de aposta:</option>
                <option v-for="group in groups" :value="group.id">
                    {{ group.name }}
                </option>
            </select>
            <hr></hr>

            <input
                v-if="select_group"
                type="text"
                placeholder="Pesquise por um amigo"
                class="form-control"
                v-model="username"
            >

            <div
                v-if="users"
                v-for="user in users"
                class="panel-users"
            >
                <div class="panel-users-item">
                    {{ user.name }}
                </div>
                <div class="panel-users-item text-right">
                    <button
                        type="button"
                        name="button"
                        class="btn btn-success"
                        @click="includeUserGroup( user.user_id, select_group )"
                    >
                    Incluir
                </button>
                </div>
            </div>
        </div>

        <hr v-if="select_group && users_group">
        <div
            v-if="select_group && users_group"
            v-for="user in users_group"
            class="panel-users"
        >
            <div class="panel-users-item">
                {{ user.username }}
            </div>
            <div class="panel-users-item text-right">
                <button
                    type="button"
                    name="button"
                    class="btn btn-primary"
                    @click="removeUserGroup( user.id, select_group, user.user_id )"
                >
                    Remover
                </button>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    props: [ "groups" ],
    data () {
        return {
            select_group: null,
            users_group: [],
            username: null,
            users: []
        }
    },
    watch: {
        select_group: function () {
            if ( this.select_group ) {
                this.searchGroup()
            }
        },
        username: function () {
            if ( this.username ) {
                this.searchUser()
            }
            else {
                this.users = null
            }
        }
    },
    methods: {
        searchGroup: function () {
            Vue.axios.get( '/api/usrgroup/' + this.select_group )
            .then( response => {
                // current
                this.users_group = response.data.response
            })
            .catch( e => {
                console.log( "Error: " + e )
            })
        },
        searchUser: function () {
            Vue.axios.get( 'api/comparefriend/' + this.username )
            .then( response => {
                // current
                this.users = response.data.friends.data
            })
            .catch( e => {
                console.log( "Error: " + e )
            })
        },
        includeUserGroup: function ( user, group ) {
            if ( user && group ) {
                Vue.axios.get( 'api/usrgroupins/' + user + '/' + group )
                .then( response => {
                    // current
                    this.searchGroup()
                })
                .catch( e => {
                    console.log( "Error: " + e )
                })
            }
        },
        removeUserGroup: function ( id, group, user ) {
            if ( id && group && user ) {
                Vue.axios.get( 'api/usrgrouprem/' + id + '/' + group + '/' + user )
                .then( response => {
                    // current
                    this.searchGroup()
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
