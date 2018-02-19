<template lang="html">
  <div class="">
    <h1>Elenco media</h1>
    <hr>
    <div v-for="progetto in elencoMedia" class="row">
      <h4>{{progetto.project}}</h4>
      <hr>
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <td>Id</td><td>Path</td><td>Name</td><td>Azioni</td>
          </tr>
        </thead>
        <tbody>
          <tr v-for="media in progetto.media">
            <td>{{media.id}}</td><td>{{media.path}}</td><td>{{media.name}}</td><td><button>Cancella</button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>

import MediaRequest from '@/request/Media'
export default {
  name: "ElencoMediaPage",
  data() {
    return {
      elencoMedia: []
    }
  },
  beforeCreate() {
    var vuec = this;
    MediaRequest.getAll(function(resp){
      if (resp.data.status === 'OK') {
        vuec.elencoMedia = resp.data.data;
      } else {
        console.error("Error: " + resp.data.message);
      }
    });
  }
}
</script>

<style lang="css">
</style>
