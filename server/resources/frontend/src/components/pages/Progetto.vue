<template>
  <div class="">
    <h1>Project details</h1>
    <h2>{{progetto.nome}}</h2>
    <hr>
      <router-link :to="{ name: 'progettoEdit', params: {id:progetto.id} }">
        <button class="btn btn-info">Edit</button>
      </router-link>
    <hr>
    <div class="row">
      <div class="col">
        <div class="row">
          <div class="col">
            <strong>Id</strong>
          </div>
          <div class="col">
            {{progetto.id}}
          </div>
        </div>
        <div class="row">
          <div class="col">
            <strong>Name</strong>
          </div>
          <div class="col">
            {{progetto.nome}}
          </div>
        </div>
        <div v-for="extra in progetto.extra" class="row">
          <div class="col">
            <strong>{{extra.chiave}}</strong>
          </div>
          <div class="col">
            {{extra.valore}}
          </div>
        </div>
      </div>
      <div class="col">
        <div class="row">
          <div class="col">
            <strong>Description</strong>
          </div>
        </div>
        <div class="row">
          <div class="col">
            {{progetto.descrizione}}
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import ProgettoRequest from '@/request/Progetto'

export default {
  name: "ProgettoPage",
  data() {
    return {
      progetto: {
        id: '0',
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
  }
}
</script>
