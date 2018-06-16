
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('jquery');

require('./bootstrap');

require('owl.carousel');

require('bootstrap-datetime-picker');

window.Vue = require('vue');

var Vue =require('vue');

Vue.use(require('vue-resource'));

import Cart from './components/Cart.vue';

import Profile from './components/Profile.vue';
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
var shop = new Vue({
    el: '#shop',
    data(){
        return {
            total : 0,
            user : {
                password: '',
                address: '',
                telephone: ''
            }
        }
    },

    methods: {
        addToCart : function (id) {
            axios.get('/shop/add_to_cart/'+id).then((res) => {
                $('#total').html(res.data.total);
                $('.'+id).show();
            }).catch((err) => console.error(err));
        },

        edit : function () {
            axios.post('/user/edit',this.user).then(response => {
               alert(response.data.result);
           }).catch(e => {
               alert(e);
           });
        }
    },
    components : {Cart}
});

var profile = new Vue({
    el: '#app',
    data(){
        return {
            logout : false
        }
    },

    methods: {
        addMusic(music_id){
            var formdata = new FormData();

            formdata.append('music_id', music_id);

            axios.post('/playlist', formdata).then(response => {
                alert(response.data.result);
            }).catch(e => {
                alert(e);
            });
        },

        toggleResposiveMenu(){
            this.showRespNav = !this.showRespNav;
            if(this.showRespNav){
                $('.responsive-nav').animate({
                    height: "450px"
                }, 500);
            }else{
                $('.responsive-nav').animate({
                    height: "0px"
                }, 500);
            }
        },

    },
    components : {Profile}
});