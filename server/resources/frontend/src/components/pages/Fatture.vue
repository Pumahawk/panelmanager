<template>
  <div>
    <h1>List of invoices</h1>
    <div class="p">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <td>Name</td><td>Actions</td>
          </tr>
        </thead>
        <tbody>
          <tr v-for="fattura in fatture">
            <td>{{fattura}}</td><td><a :href="'/REST.php/Fattura/' + fattura" target="_blank"><button type="button">Open</button></a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
<script>
import FatturaRequest from '@/request/Fattura'
export default {
  name: "FatturePage",
  data() {
    return {
      fatture: []
    }
  },
  beforeCreate() {
    var vuec = this;
    FatturaRequest.getAll(function(resp) {
      vuec.fatture = resp.data.fatture;
    });
  },
  methods: {
    remove(name) {
      alert(name);
    }
  }
}
</script>
