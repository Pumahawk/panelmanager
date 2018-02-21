<template>
  <div>
    <h2>Elenco progetti</h2>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <td>
              ID
            </td>
            <td>
              Nome
            </td>
            <td>
              Azioni
            </td>
          </tr>
        </thead>
        <tbody>
          <tr v-for="progetto, index in progetti">
            <td>
              {{progetto.id}}
            </td>
            <td>
              {{progetto.nome}}
            </td>
            <td>
              <router-link :to="{ name: 'progetto', params: {id: progetto.id} }">
                <button>
                  Apri
                </button>
              </router-link>
              <button @click="destory(index)">
                Cancella
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
<script>
  import swal from 'sweetalert2'
  import ProgettoRequest from '@/request/Progetto'
  export default {
    name: 'ProgettiPage',
    beforeCreate() {
      var module = this;
      ProgettoRequest.getAll(function(resp){
        module.progetti = resp.data.data;
      });
    },
    data() {
      return {
        progetti: null
      }
    },
    methods: {
      destory(index) {
        var vuec = this;
        var id = this.progetti[index].id;
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
            ProgettoRequest.destroy(id, function(resp) {
              if(resp.data.status == 'OK') {
                swal('Deleted!','This project has been deleted.','success');
                vuec.progetti.splice(index, 1);
              } else {
                swal('Oops!', 'Sorry, there is something wrong...', 'error');
              }
            });
          }
        });
      }
    }
  }
</script>
