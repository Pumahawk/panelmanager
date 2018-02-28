<template>
  <div>
    <h1>Info profile</h1>
    <hr>
    <h2>Option login</h2>
    <hr>
    <p>
      <strong>E-Mail: </strong>{{mail}}
      <div class="p">
        <button @click="editMail=true" type="button">Edit E-Mail</button>
      </div>
    </p>
    <hr v-if="editMail">
    <div v-if="editMail" class="row">
      <form @submit.prevent="changeMail()" class="col-auto form">
        <div class="form-group">
          <label><strong>E-Mail</strong></label>
          <input v-model="form.mail" required class="form-control" type="email" name="email" value="" placeholder="New mail login">
        </div>
        <div class="text-right form-group">
          <button type="submit">Change E-Mail</button>
          <button @click="editMail=false" type="button">Close</button>
        </div>
      </form>
    </div>
    <hr>
    <form @submit.prevent="changePassword()" class="row">
      <div class="col-auto form">
        <div class="form-group">
          <label><strong>Password</strong></label>
          <input v-model="form.password" required class="form-control" type="password" name="pasword" value="" placeholder="New password">
        </div>
        <div class="form-group">
          <label><strong>Repeat password</strong></label>
          <input v-model="form.ripetipassword" required class="form-control" type="password" name="repeatpassword" value="" placeholder="Repeat password">
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
  import UserRequest from '@/request/User'
  export default {
    name: "ProfilePage",
    data() {
      return {
        editMail: false,
        form: {
          mail: null,
          password: null,
          ripetipassword: null
        },
        mail: ''
      }
    },
    beforeCreate() {
      var vuec = this;
      UserRequest.info(function(resp) {
        vuec.mail = resp.data.mail;
      });
    },
    methods: {
      changePassword() {
        var vuec = this;
        if(vuec.form.password == vuec.form.ripetipassword) {
          swal({
            title: 'Are you sure?',
            text: "Do you realy want change password?!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, change it!'
          }).then((result) => {
            if (result.value) {
              UserRequest.editPassword(vuec.form.password, function(resp){
                swal(
                  'Changed!',
                  'This password has been chaged.',
                  'success'
                )
              });
            }
          });
        } else {
          swal('Oops...', 'The second password is wrong...', 'error');
        }
      },
      changeMail() {
        var vuec = this;
        swal({
          title: 'Are you sure?',
          text: "Do you realy want change email?!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, change it!'
        }).then((result) => {
          if (result.value) {
            UserRequest.editMail(vuec.form.mail, function(resp){
              swal(
                'Changed!',
                'This email has been chaged.',
                'success'
              )
            });
          }
        });
      }
    }
  }
</script>
