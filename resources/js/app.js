require('./bootstrap');
window.Vue = require('vue');
import VueRouter from 'vue-router';
import VueHead from 'vue-head';
import LoadScript from 'vue-plugin-load-script';
import VueProgressBar from 'vue-progressbar';
import Vuex from 'vuex';
import routes from '@/routes/routes';
import VueSessionStorage from 'vue-sessionstorage';
import VueElementLoading from 'vue-element-loading';
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('VueElementLoading', VueElementLoading);

Vue.use(VueSessionStorage);
Vue.use(VueHead);
Vue.use(Vuex);
Vue.use(VueRouter);
Vue.use(LoadScript);
const store = new Vuex.Store({
  state: {
    modelloader: false,
    pageloader : false
  },
  mutations: {
    loaderval (state, obj) {
      if(obj.type == 'modelloader'){
        state.modelloader = obj.val;
      }else{
        state.pageloader = obj.val;
      }
    }
  }
})
const progressbaroptions = {
  color: '#00ff00',
  failedColor: '#ff0000',
  thickness: '5px',  
}
Vue.use(VueProgressBar, progressbaroptions)

const router = new VueRouter({
    mode: 'history',
    routes: routes,
    default: VueRouter
});
router.beforeEach((to, from, next) => {
  if (to.meta.requiresauth && !router.app.$session.exists('auth')) {
    next({'name': 'signin'});
  }else if(to.meta.requiresauth !=null && !to.meta.requiresauth && router.app.$session.exists('auth')){
    next({'name' : 'index'})
  }else{
    next();
  }
});
const app = new Vue({
    el: '#app',
    store,
    router,
    methods:{
      logout(){
        router.app.$session.clear()
        ajax(route('user.logout'),'GET','');
      }
    }
});
