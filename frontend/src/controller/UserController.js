import axios from 'axios'
import swal from 'sweetalert2'

export default {
  login(vueLogin) {
    axios.post('/REST.php/User/login',{
      email: vueLogin.email,
      password: vueLogin.password
    }).then(function(resp){
      var data = resp.data;
      if(data.status == 'OK') {
        swal({
          type: 'success',
          title: 'Success',
          text: 'Successful login!'
        })
        vueLogin.$emit('login');
      } else {
        swal({
          type: 'error',
          title: 'Oops...',
          text: 'Something went wrong!'
        })
      }
    });
  },
  logout(vueApp) {
      vueApp.$emit('logout');
  }
}
