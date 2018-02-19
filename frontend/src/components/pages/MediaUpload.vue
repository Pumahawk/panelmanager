<template lang="html">
  <div>
    <h1>Upload media</h1>
    <hr>
    <button class="btn btn-success">Upload</button>
    <hr>
    <div class="form">
      <div class="form-group">
        <label for="project"><strong>Progetto</strong></label>
        <select class="form-control" name="">
          <option v-for="progetto in progetti" :value="progetto.id">{{progetto.nome}}</option>
        </select>
      </div>
      <div class="form-group">
        <label for="media"><strong>Media</strong></label>
        <input @change="updateForm()" id="media" type="file" class="form-control">
      </div>
    </div>
  </div>
</template>

<script>
import ProgettoRequest from '@/request/Progetto'

export default {
  name: "MediaUploadPage",
  data() {
    return {
      progetti: [],
      form: {
        file: null,
        project: null
      }
    }
  },
  beforeCreate() {
    var vuec = this;
    ProgettoRequest.getAll(function(resp){
      if(resp.data.status === 'OK') {
        vuec.progetti = resp.data.data;
      } else {
        console.error(resp.data.message);
      }
    });
  },
  methods: {
    updateForm() {
      this.form.file = document.getElementById('media').files[0];
    }
  }
}
</script>

<style lang="css">
</style>
