
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import BootstrapVue from 'bootstrap-vue'
import { store } from './store'
window.Vue = require('vue');

Vue.use(BootstrapVue)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('api-doc-component', require('./components/ApiDocComponent.vue').default);
Vue.component('signup-view', require('./views/SignUpView.vue').default);
Vue.component('signin-view', require('./views/SignInView.vue').default);
Vue.component('header-component', require('./components/HeaderComponent.vue').default);
Vue.component('social-feed-view', require('./views/SocialFeedView.vue').default);
const app = new Vue({
    el: '#app',
    store
});
