import swal from 'sweetalert2'
import ProgettoRequest from '@/request/Progetto'

export default {
  addExtra() {
    if(this.inExtraKey != '' && this.inExtraValue != '') {
      this.option.extra.push({chiave: this.inExtraKey, valore: this.inExtraValue});
      this.inExtraKey = '';
      this.inExtraValue = '';
    } else {
      swal({
          type: 'error',
          title: 'Oops...',
          text: 'Don\'t forget to insert Key and Value!'
      });
    }
  },
  removeExtra(index) {
    swal({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        this.option.extra.splice(index, 1);
        swal(
          'Deleted!',
          'This extra has been deleted.',
          'success'
        )
      }
    });
  },
  saveAll() {
    ProgettoRequest.saveOption(this.option, function(resp){
      if(resp.data.status == "OK"){
        swal(
          'Saved!',
          'All options has been saved.',
          'success'
        );
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
