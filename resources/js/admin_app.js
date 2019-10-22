require('./bootstrap');
window.Vue = require('vue');
import VueRouter from 'vue-router';
import VueHead from 'vue-head';
import LoadScript from 'vue-plugin-load-script';
import VueProgressBar from 'vue-progressbar';
import VueElementLoading from 'vue-element-loading';
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('VueElementLoading', VueElementLoading); 
Vue.use(VueHead)
Vue.use(VueRouter);
Vue.use(LoadScript);
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