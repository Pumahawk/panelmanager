<template lang="html">
  <div class="">
    <h1>Edit project</h1>
    <hr>
    <button @click="edit()" class="btn btn-success">Save</button>
    <hr>
    <div class="row">
      <div class="col">
        <div class="form">
          <div class="form-group">
            <label><strong>Name</strong></label>
            <input v-model="progetto.nome" class="form-control" type="text" name="">
          </div>
          <div v-for="extra in progetto.extra" class="form-group">
            <label><strong>{{extra.chiave}}</strong></label>
            <input v-model="extra.valore" class="form-control" type="text" name="">
          </div>
        </div>
      </div>
      <div class="col">
        <div class="form">
          <div class="form-group">
            <label><strong>Description</strong></label>
            <textarea v-model="progetto.descrizione" class="form-control" value="nome" name="name" rows="8" cols="80"></textarea>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import swal from 'sweetalert2'
import ProgettoRequest from '@/request/Progetto'
export default {
  name: "ModificaProgetto",
  data() {
    return {
      progetto: {
        id: '',
        nome: '',
        descrizione: '',
        extra: []
      }
    }
  },
  beforeCreate() {
    var vuec = this;
    var id = this.$route.params.id;
    ProgettoRequest.getById(id,function(resp) {
      vuec.progetto = resp.data.data;
    });
  },
  methods: {
    edit() {
      ProgettoRequest.edit(this.progetto, function(resp){
        if(resp.data.status == "OK") {
          swal('Yeah!', 'This project has been edited', 'success');
        } else {
          swal('Oops...', 'Sorry, Something was going wrong..', 'error');
        }
      });
    }
  }
}
</script>

<style lang="css">
</style>
