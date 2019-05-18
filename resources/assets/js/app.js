
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

Vue.component('list-chat', require('./components/ListChat.vue'));
Vue.component('ChatUser', require('./components/ChatUser.vue'));
Vue.component('perfil-text-box', require('./components/ProfileEdit.vue'));
Vue.component('Lng-Percent', require('./components/LngPercent.vue'));
Vue.component('programming-lng', require('./components/ProgrammingLng.vue'));
Vue.component('work-xperience', require('./components/WorkXperience.vue'));
Vue.component('education', require('./components/Education.vue'));

const app = new Vue({
    el: '#app'
});

const applng = new Vue({
    el: '#applng'
});

const appXperience = new Vue({
    el: '#appXperience'
});

const appEducation = new Vue({
    el: '#appEducation'
});