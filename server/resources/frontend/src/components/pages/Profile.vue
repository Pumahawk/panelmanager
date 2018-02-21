<template>
  <div>
    <h1>Info profilo</h1>
    <hr>
    <h2> Option login</h2>
    <hr>
    <p>
      <strong>E-Mail: </strong>user@user.it
      <div class="p">
        <button @click="editMail=true" type="button">Edit E-Mail</button>
      </div>
    </p>
    <hr v-if="editMail">
    <div v-if="editMail" class="row">
      <form @submit.prevent="changeMail()" class="col-auto form">
        <div class="form-group">
          <label><strong>E-Mail</strong></label>
          <input required class="form-control" type="email" name="email" value="" placeholder="New mail login">
        </div>
        <div class="text-right form-group">
          <button type="submit">Change E-Mail</button>
          <button @click="editMail=false" type="button">Close</button>
        </div>
      </form>
    </div>
    <hr>
    <form @sumbit.prevent="changePassword()" class="row">
      <div class="col-auto form">
        <div class="form-group">
          <label><strong>Password</strong></label>
          <input required class="form-control" type="password" name="pasword" value="" placeholder="New password">
        </div>
        <div class="form-group">
          <label><strong>Repeat password</strong></label>
          <input required class="form-control" type="password" name="repeatpassword" value="" placeholder="Repeat password">
        </div>
        <div class="text-right form-group">
          <button type="submit">Change password</button>
        </div>
      </div>
    </form>
  </div>
</template>
<script>
  import swal from 'sweetalert2'
  export default {
    name: "ProfilePage",
    data() {
      return {
        editMail: false
      }
    },
    methods: {
      changePassword() {
        swal('Oops...', 'Methods non supported yet', 'error');
      },
      changeMail() {
        swal('Oops...', 'Methods non supported yet', 'error');
      }
    }
  }
</script>
