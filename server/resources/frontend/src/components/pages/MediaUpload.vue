<template lang="html">
  <div>
    <h1>Upload media</h1>
    <hr>
    <button @click="uploadMedia()" class="btn btn-success">Upload</button>
    <hr>
    <div class="form">
      <div class="form-group">
        <label for="project"><strong>Project</strong></label>
        <select v-model="form.project" class="form-control" name="">
          <option v-for="progetto in progetti" :value="progetto.id">{{progetto.id}} : {{progetto.nome}}</option>
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
import MediaRequest from '@/request/Media'
import swal from 'sweetalert2'

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
    },
    uploadMedia() {
      if (this.form.project != null && this.form.file != null) {
        var data = new FormData();
        data.append('project', this.form.project);
        data.append('file', this.form.file);

        MediaRequest.upload(data, function(resp){
          if(resp.data.status === 'OK') {
            swal('Yeah', 'Media uploaded!', 'success');
          } else {
            swal('Oops...', resp.data.message, 'error')
          }
        });
      } else {
        swal('Oops...', 'You have to select project and file...', 'error');
      }
    }
  }
}
</script>

<style lang="css">
</style>
