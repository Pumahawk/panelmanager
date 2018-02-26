<template>
  <div>
    <h1>Impostazioni fattura</h1>
    <hr>
    <button class="btn btn-success" type="button"><strong>Save</strong></button>
    <hr>
    <form @submit.prevent class="form">
      <div class="form-group">
        <label><strong>Default From</strong></label>
        <textarea v-model="form.from" class="form-control" rows="" cols="" required="true"></textarea>
      </div>
      <div class="form-group">
        <label><strong>Default Bill to</strong></label>
        <textarea v-model="form.bill" class="form-control" rows="" cols="" required="true"></textarea>
      </div>
      <div class="form-group">
        <label><strong>Default Ship to</strong></label>
        <textarea v-model="form.ship" class="form-control" rows="" cols="" required="true"></textarea>
      </div>
      <div class="form-group">
        <label><strong>Default Termini e condizioni</strong></label>
        <textarea v-model="form.termsConditions" class="form-control" rows="" cols="" required="true"></textarea>
      </div>
    </form>
  </div>
</template>
<script>
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
  methods: {
    saveImpostazioni() {
      // TODO saveImpostazioni da implementare
      alert('Funzionalita mancante');
    }
  }
}
</script>
