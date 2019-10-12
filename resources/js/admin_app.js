require('./bootstrap');
window.Vue = require('vue');
import VueRouter from 'vue-router';
import VueHead from 'vue-head';
import LoadScript from 'vue-plugin-load-script';
import VueProgressBar from 'vue-progressbar';
import loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';

// import Vuex from 'vuex'
Vue.use(VueHead)
Vue.use(VueRouter);
Vue.use(LoadScript);
const loadingoptions = {
    loader:'bars',
    color: '#8e44ad',
    zIndex: 999,
    backgroundColor: "#ddd"
}
Vue.use(loading,loadingoptions);
const progressbaroptions = {
  color: '#00ff00',
  failedColor: '#ff0000',
  thickness: '5px',  
}
Vue.use(VueProgressBar, progressbaroptions)
import routes from '@/adminroutes/routes';

const router = new VueRouter({
    mode: 'history',
    routes: routes
});
const app = new Vue({
    el: '#adminapp',
    router, 
});