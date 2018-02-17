import swal from 'sweetalert2'
import ProgettoRequest from '@/request/Progetto'
export default {
  save() {
    var comp = this;
    ProgettoRequest.save(this.progetto, function(resp){
      if(resp.data.status == "OK"){
        swal(
          'Saved!',
          'Project has been saved.',
          'success'
        );
        comp.$router.push('/progetti');
      } else {
        swal({
            type: 'error',
            title: 'Oops...',
            text: resp.data.message
        });
      }
    });
  }
}
