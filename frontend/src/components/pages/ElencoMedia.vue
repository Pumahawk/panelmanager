<template lang="html">
  <div class="">
    <h1>Elenco media</h1>
    <hr>
    <div v-for="progetto in progetti">
      <h4>{{progetto.info.id}}:{{progetto.info.nome}}</h4>
      <table v-if="progetto.media.length > 0" class="table table-striped table-sm">
        <thead>
          <tr>
            <td>Id</td><td>Nome media</td><td>Azioni</td>
          </tr>
        </thead>
        <tbody>
          <tr v-for="media in progetto.media">
            <td>{{media.id}}</td><td>{{media.nome}}</td><td><button>Cancella</button></td>
          </tr>
        </tbody>
      </table>
      <hr v-else>
    </div>
  </div>
</template>

<script>

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
  }
}
</script>

<style lang="css">
</style>
