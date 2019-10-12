require('./bootstrap');
window.Vue = require('vue');
import VueRouter from 'vue-router';
import VueHead from 'vue-head';
import LoadScript from 'vue-plugin-load-script';
import VueProgressBar from 'vue-progressbar';
import loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
// import Vuex from 'vuex';
import routes from '@/routes/routes';
import VueSessionStorage from 'vue-sessionstorage';
Vue.use(VueSessionStorage);
Vue.use(VueHead);
// Vue.use(Vuex);
Vue.use(VueRouter);
Vue.use(LoadScript);
// const store = new Vuex.Store({
//   state: {
//     user: null
//   },
//   mutations: {
//     login (state,value) {
//       console.log(value);
//       state.user = value;
//       console.log(state.user);
//     },
//     logout(state){
//       state.user = {}
//     }
//   }
// });
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

const router = new VueRouter({
    mode: 'history',
    routes: routes,
    default: VueRouter
});
router.beforeEach((to, from, next) => {
  console.log(to.meta.requiresauth,router.app.$session.exists('auth'));
  if (to.meta.requiresauth && !router.app.$session.exists('auth')) {
    console.log(1);
    next({'name': 'signin'});
  }else if(to.meta.requiresauth !=null && !to.meta.requiresauth && router.app.$session.exists('auth')){
    console.log(2);
    next({'name' : 'index'})
  }else{
    console.log(3);
    next();
  }
});
const app = new Vue({
    el: '#app',
    // store,
    router,
    methods:{
      logout(){
        router.app.$session.clear()
        ajax(route('user.logout'),'GET','');
      }
    }
});
