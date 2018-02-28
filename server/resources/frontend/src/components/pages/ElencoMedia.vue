<template lang="html">
  <div class="">
    <h1>List of media</h1>
    <hr>
    <div v-for="progetto in progetti">
      <h4>{{progetto.info.id}}:{{progetto.info.nome}}</h4>
      <table v-if="progetto.media.length > 0" class="table table-striped table-sm">
        <thead>
          <tr>
            <td>Id</td><td>Name media</td><td>Actions</td>
          </tr>
        </thead>
        <tbody>
          <tr v-for="media, index in progetto.media">
            <td>{{media.id}}</td><td>{{media.nome}}</td><td><button @click="cancella(progetto, index)">Delete</button></td>
          </tr>
        </tbody>
      </table>
      <hr v-else>
    </div>
  </div>
</template>

<script>
import swal from 'sweetalert2'
import MediaRequest from '@/request/Media'
export default {
  name: "ElencoMediaPage",
  data() {
    return {
      progetti: []
    }
  },
  beforeCreate() {
    var vuec = this;
    MediaRequest.getAll(function(resp){
      if (resp.data.status === 'OK') {
        vuec.progetti = resp.data.data;
      } else {
        console.error("Error: " + resp.data.message);
      }
    });
  },
  methods: {
    cancella(progetto, index) {
      var id = progetto.media[index].id;
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
          MediaRequest.cancella(id, function(resp) {
            if(resp.data.status == 'OK') {
              swal('Deleted!','This media has been deleted.','success');
              progetto.media.splice(index, 1);
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

<style lang="css">
</style>
