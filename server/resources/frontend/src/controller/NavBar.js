import swal from 'sweetalert2'
import UserRequest from '@/request/User'

export default {
  logout() {
    var vueComponent = this;
    UserRequest.logout(function(resp){
      if(resp.data.status === 'OK') {
        swal({
          type: 'success',
          title: 'Success',
          text: 'Successful logout!'
        })
        vueComponent.$emit('logout');
      } else {
        swal({
          type: 'error',
          title: 'Oops...',
          text: resp.data.message
        })
      }
    });
  }
}
