<template>
  <div>
    <h1>Project settings</h1>
    <hr>
    <button class="btn btn-success" @click="saveAll()"><strong>Save</strong></button>
    <hr>
    <h2>Default data</h2>
    <hr>
    <form class="row">
      <div class="col">
        <div class="form-group">
          <label for="defaultName"><strong>Default name</strong></label>
          <input v-model="option.nome" type="text" class="form-control" id="defaultName" aria-describedby="">
        </div>
        <div class="form-group">
          <label for="defaultDescrizione"><strong>Default description</strong></label>
          <textarea v-model="option.descrizione" class="form-control" id="defaultDescrizione" rows="3"></textarea>
        </div>
      </div>
    </form>
    <hr>
    <h2>Extra data</h2>
    <hr>
    <div class="row">
      <div class="col-md">
        <strong>Key</strong>
      </div>
      <div class="col-md">
        <strong>Default value</strong>
      </div>
      <div class="col-md">
        <strong>Actions</strong>
      </div>
    </div>
    <div style="padding:5px 0px 5px 0px" class="row" v-for="opt, index in option.extra">
      <div class="col-md">
        {{opt.chiave}}
      </div>
      <div class="col-md">
        {{opt.valore}}
      </div>
      <div class="col-md">
        <button @click="removeExtra(index)">Delete</button>
      </div>
    </div>
    <div class="row">
      <div class="col-md">
        <input v-model="inExtraKey" class="form-control" type="text" placeholder="Key">
      </div>
      <div class="col-md">
        <input v-model="inExtraValue" class="form-control" type="text" placeholder="Value">
      </div>
      <div class="col-md">
        <button class="btn btn-success" @click="addExtra()">Add</button>
      </div>
    </div>
  </div>
</template>
<script>
import controller from '@/controller/ImpostazioniProgetto'
import ProgettoRequest from '@/request/Progetto'
import swal from 'sweetalert2'
export default {
  name: "ImpostazioniProgettoPage",
  data() {
    return {
      inExtraKey: '',
      inExtraValue: '',
      option: {
        nome: '',
        descrizione: '',
        extra: []
      }
    }
  },
  beforeCreate() {
    var component = this;
    ProgettoRequest.getOption(function(resp){
      component.option = resp.data.data;
    });
  },
  methods: controller
}
</script>
