import swal from 'sweetalert2'
import UserRequest from '@/request/User'

export default {
  login() {
    var component = this;
    UserRequest.login({
      email: component.email, password: component.password
    }, function(resp){
      if(resp.data.status === 'OK') {
        swal({
          type: 'success',
          title: 'Login',
          text: 'Login succesfull',
        });
        component.$emit('login');
      } else {
        swal({
          type: 'error',
          title: 'Oops...',
          text: resp.data.message,
        });
      }
    });
  },
  loginForm() {
    this.login();
  }
}
