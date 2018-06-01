
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/Example.vue'));
Vue.component('betsgroups', require('./components/BetsGroups.vue'));
Vue.component('comparefriend', require('./components/CompareFriend.vue'));
Vue.component('managegroup', require('./components/ManageGroup.vue'));

const app = new Vue({
    el: '#app',
    data: {
        showNow: false,
        adc_friend: null,
        results_adc_friends: []
    },
    methods: {
        // show the menu
        showMenu () {
            this.showNow = !this.showNow
        },
        // make bet
        enterBet ( event ) {
            // valid number with regex
            if ( /[0-9]/.test( event.target.value ) ) {
                // console.log( "true" );
                Vue.axios.get( '/api/makeBet/' + event.target.id + '/' + event.target.name + '/' + event.target.value )
                    .then( response => {
                        console.log( 'Maked bet' )
                    })
                    .catch( e => {
                        console.log( "Error: " + e )
                    })
            }
            else {
                console.log( "not is a number!" )
            }
        },
        // searchAdcFriend ( event ) {
        //     this.adc_friend = event.target.value
        //
        //     if ( this.adc_friend != null ) {
        //         console.log("here");
        //         Vue.axios.get( '/api/comparefriend/' + this.adc_friend )
        //             .then( response => {
        //                 // friends
        //                 this.results_adc_friends = response.data.friends.data
        //                 // user id
        //                 // this.user_id = response.data.user.id
        //                 // console.log( this.results_adc_friends );
        //             })
        //             .catch( e => {
        //                 console.log( "Error: " + e )
        //             })
        //     }
        //     else {
        //         this.results_friends = null
        //     }
        // }
    }
});
