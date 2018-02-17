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
import controller from '@/controller/NuovoProgetto'
import ProgettoRequest from '@/request/Progetto'
export default {
  name: "NuovoProgetto",
  beforeCreate(){
    var component = this;
    ProgettoRequest.getOption(function(resp){
      component.progetto = resp.data.data;
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
  methods: controller
}
</script>
