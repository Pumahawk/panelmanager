// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import Login from '@/components/pages/Login'
import router from './router'

Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#app',
  data: {
    loginStatus: false
  },
  router,
  components: { App, Login },
  template: '<App v-if="loginStatus" @logout="logout"/><Login v-else @login="login"/>',
  methods: {
    logout() {
      this.loginStatus = false;
    },
    login() {
      this.loginStatus = true;
    }
  }
})
