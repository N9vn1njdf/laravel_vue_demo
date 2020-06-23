import Vue from 'vue'
import App from './App.vue'
import store from './store/index'
import axios from 'axios'
import VueAxios from 'vue-axios'
import ElementUI from 'element-ui';

Vue.use(ElementUI);
Vue.use(VueAxios, axios)

new Vue({
  store,
  el: '#app',
  render: h => h(App),
})