<template>
  <div class="text-center">
    <form class="form-signin" @submit.prevent="loginForm">
      <img class="mb-4" src="@/assets/global-icon.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input v-model="email"type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input v-model="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
  </div>
</template>
<script>
  import controller from '@/controller/Login'

  export default {
    name: "Login",
    data() {
      return {
        email: null,
        password: null
      }
    },
    methods: controller
  }
</script>
<style scoped>
	@import 'bootstrap/dist/css/bootstrap.min.css';
  @import '../../style/signin.css';
</style>
