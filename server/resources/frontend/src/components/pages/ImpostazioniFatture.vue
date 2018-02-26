<template>
  <div>
    <h1>Impostazioni fattura</h1>
    <hr>
    <button @click="saveImpostazioni()" class="btn btn-success" type="button"><strong>Save</strong></button>
    <hr>
    <form @submit.prevent class="form">
      <div class="form-group">
        <label><strong>Default From</strong></label>
        <textarea v-model="form.from" class="form-control" rows="" cols=""></textarea>
      </div>
      <div class="form-group">
        <label><strong>Default Bill to</strong></label>
        <textarea v-model="form.bill" class="form-control" rows="" cols=""></textarea>
      </div>
      <div class="form-group">
        <label><strong>Default Ship to</strong></label>
        <textarea v-model="form.ship" class="form-control" rows="" cols=""></textarea>
      </div>
      <div class="form-group">
        <label><strong>Default Termini e condizioni</strong></label>
        <textarea v-model="form.termsConditions" class="form-control" rows="" cols=""></textarea>
      </div>
    </form>
  </div>
</template>
<script>
import freq from '@/request/Fattura'
import swal from 'sweetalert2'
export default {
  name: "ImpostazioniFatture",
  data() {
    return {
      form: {
        from: '',
        bill: '',
        ship: '',
        termsConditions: ''
      }
    }
  },
  beforeCreate() {
    var vuec = this;
    freq.getOption(function(resp){
      var data = resp.data.data;
      vuec.form.from = data.from;
      vuec.form.ship = data.ship;
      vuec.form.bill = data.bill;
      vuec.form.termsConditions = data.terms;
    });
  },
  methods: {
    saveImpostazioni() {
      var dataForm = {
        from: this.form.from,
        ship: this.form.ship,
        bill: this.form.bill,
        terms: this.form.termsConditions
      };
      swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, change it!'
      }).then((result) => {
        if (result.value) {
          freq.saveOption(dataForm,function() {
            swal(
              'Changed!',
              'This option has been changed.',
              'success'
            )
          });
        }
      });
    }
  }
}
</script>
