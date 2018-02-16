<template>
  <div>
    <h1>Impostazioni progetto</h1>
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
          <label for="defaultDescrizione"><strong>Default descrizione</strong></label>
          <textarea v-model="option.descrizione" class="form-control" id="defaultDescrizione" rows="3"></textarea>
        </div>
      </div>
    </form>
    <hr>
    <h2>Extra data</h2>
    <hr>
    <div class="row">
      <div class="col-md">
        <strong>Chiave</strong>
      </div>
      <div class="col-md">
        <strong>Valore di default</strong>
      </div>
      <div class="col-md">
        <strong>Azioni</strong>
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
        <button class="btn btn-danger" @click="removeExtra(index)">Elimina</button>
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
import ProgettoController from '@/controller/ProgettoController'
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
    ProgettoController.getOption(function(data){
      component.option = data;
    });
  },
  methods: {
    addExtra() {
      if(this.inExtraKey != '' && this.inExtraValue != '') {
        this.option.extra.push({chiave: this.inExtraKey, valore: this.inExtraValue});
        this.inExtraKey = '';
        this.inExtraValue = '';
      } else {
        swal({
            type: 'error',
            title: 'Oops...',
            text: 'Don\'t forget to insert Key and value!'
        });
      }
    },
    removeExtra(index) {
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
          this.option.extra.splice(index, 1);
          swal(
            'Deleted!',
            'This extra has been deleted.',
            'success'
          )
        }
      });
    },
    saveAll() {
      ProgettoController.save(this.option, function(resp){
        if(resp.data.status == "OK"){
          swal(
            'Saved!',
            'All options has been saved.',
            'success'
          );
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
