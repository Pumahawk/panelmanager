<template>
  <div>
    <h1>Nuovo progetto</h1>
    <hr>
    <button class="btn btn-success" @click="save()"><strong>Save</strong></button>
    <hr>
    <h2>Dati progetto</h2>
    <hr>
    <form class="row">
      <div class="col">
        <div class="form-group">
          <label for="nome"><strong>Nome</strong></label>
          <input v-model="progetto.nome" type="text" class="form-control" id="nome" aria-describedby="">
        </div>
        <div class="form-group">
          <label for="defaultDescrizione"><strong>Default descrizione</strong></label>
          <textarea v-model="progetto.descrizione" class="form-control" id="defaultDescrizione" rows="3"></textarea>
        </div>
      </div>
    </form>
    <hr>
    <h2>Extra data</h2>
    <hr>
    <div style="padding:5px 0px 5px 0px" class="row" v-for="opt, index in progetto.extra">
      <div class="col form-group">
        <label for="nome"><strong>{{opt.chiave}}</strong></label>
        <input v-model="opt.valore" type="text" class="form-control" id="nome" aria-describedby="">
      </div>
    </div>
  </div>
</template>
<script>
import ProgettoController from '@/controller/ProgettoController'
import swal from 'sweetalert2'
export default {
  name: "NuovoProgetto",
  beforeCreate(){
    var component = this;
    ProgettoController.getOption(function(data){
      component.progetto = data;
    });
  },
  data() {
    return {
      progetto: {
        nome: '',
        descrizione: '',
        extra: []
      }
    }
  },
  methods: {
    save() {
      var comp = this;
      ProgettoController.save(this.progetto, function(resp){
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
}
</script>
