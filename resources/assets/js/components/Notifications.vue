<template lang="html">
    <div class="panel-body">

        <div v-for="ntf in notif" class="ntf-item">
            <p><b>{{ ntf.username }}</b> pediu para entrar no seu grupo <b>{{ ntf.group_name }}</b></p>
            <button
                type="button"
                class="btn btn-success"
                @click="acept( ntf.inv_id, ntf.group_id, ntf.user_id )"
            >
                Aceitar
            </button>
            <button
                type="button"
                class="btn btn-primary"
                @click="recused( ntf.inv_id )"
            >
                Recusar
            </button>
        </div>

    </div>
</template>

<script>
export default {
    props: [ "notifications" ],
    data () {
        return {
            notif: this.notifications
        }
    },
    methods: {
        // acept
        acept ( inv_id, group_id, user_id ) {
            if ( inv_id && group_id && user_id ) {
                Vue.axios.get( '/api/ntfacept/' + inv_id + '/' + group_id + '/' + user_id )
                // Vue.axios.get( '/worldcup/api/ntfacept/' + inv_id + '/' + group_id + '/' + user_id )
                    .then( response => {
                        // current
                        this.notif = response.data

                        if ( this.notif.length == 0 ) {
                            window.location = window.location.origin + '/home'
                        }
                    })
                    .catch( e => {
                        console.log( "Error: " + e )
                    })
            }
        },
        // recused
        recused ( inv_id ) {
            if ( inv_id ) {
                Vue.axios.get( '/api/ntfrecused/' + inv_id )
                // Vue.axios.get( '/worldcup/api/ntfrecused/' + inv_id )
                    .then( response => {
                        // current
                        this.notif = response.data

                        if ( this.notif.length == 0 ) {
                            window.location = window.location.origin + '/home'
                        }
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
