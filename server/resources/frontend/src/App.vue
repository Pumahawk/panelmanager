<template>
  <div>
    <NavBar @logout="logout" />
      <div class="container-fluid">
      <div class="row">
        <SideBar/>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <router-view></router-view>
        </main>
      </div>
    </div>
  </div>
</template>

<script>
import SideBar from '@/components/SideBar'
import NavBar from '@/components/NavBar'
export default {
  name: 'App',
  methods: {
    logout() {
      this.$emit('logout');
    }
  },
  components: {
    SideBar, NavBar
  }
}
</script>

<style>
	@import 'bootstrap/dist/css/bootstrap.min.css';
	@import './style/dashboard.css';
	@import './style/custom.css';
</style>
