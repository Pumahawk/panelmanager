<template>
  <div>
    <h1>Creazione fattura</h1>
    <hr>
    <form @submit.prevent="creaFattura()" class="p-2">
      <div class="row">
        <div class="col-md-7">
          <div class="form-group">
    				<label><strong>From</strong></label>
    				<textarea v-model="form.from" class="form-control" rows="" cols="" required="true"></textarea>
    			</div>
    			<div class="form-group">
    				<label><strong>Bill To</strong></label>
    				<textarea v-model="form.bill" class="form-control" rows="" cols="" required="true"></textarea>
    			</div>
    			<div class="form-group">
    				<label><strong>Ship To</strong></label>
    				<textarea v-model="form.ship" class="form-control" rows="" cols="" required="true"></textarea>
    			</div>
        </div>
        <div class="col">
          <div class="form-group">
    				<label><strong>Invoice</strong></label>
    				<input v-model="form.invoice" class="form-control" type="number" required="true">
    			</div>
    			<div class="form-group">
    				<label><strong>Invoice Date</strong></label>
    				<input v-model="form.invoiceDate" class="form-control" type="text" required="true">
    			</div>
    			<div class="form-group">
    				<label><strong>P.D.</strong></label>
    				<input v-model="form.pd" class="form-control" type="text" required="true">
    			</div>
    			<div class="form-group">
    				<label><strong>Due Date</strong></label>
    				<input v-model="form.dueDate" class="form-control" type="text" required="true">
    			</div>
        </div>
      </div>
      <hr>
      <div v-for="item, index in form.items" class="row">
        <div class="col-md">
          <div class="form-group">
            <label><strong>Quantita</strong></label>
            <input v-model="item.qty" class='form-control' type="number" required="true">
          </div>
        </div>
        <div class="col-md">
          <div class="form-group">
            <label><strong>Descrizione</strong></label>
            <input v-model="item.descrizione" class='form-control' type="text" required="true">
          </div>
        </div>
        <div class="col-md">
          <div class="form-group">
            <label><strong>Prezzo unita</strong></label>
            <input v-model="item.uPrice" class='form-control' type="number" required="true">
          </div>
        </div>
        <div class="col-md">
          <div class="form-group">
            <label><strong>Totale</strong></label>
            <input v-model="item.qty * item.uPrice" class='form-control' type="text" readonly="true">
          </div>
        </div>
        <div class="col-md">
          <div class="form-group">
            <label><strong>Tasse</strong></label>
            <input v-model="item.tax" class='form-control' type="number" required="true">
          </div>
        </div>
        <div class="col-md">
          <div class="form-group">
            <label><strong>Azioni</strong></label><br>
            <button @click="delItem(index)" type="button">Cancella</button>
          </div>
        </div>
      </div>
      <div class="text-center">
        <button @click="newItem()" type="button">New item</button>
      </div>
      <hr>
      <div class="form-group">
        <label><strong>Termini e condizioni</strong></label>
        <textarea v-model="form.termsConditions" class="form-control" rows="" cols="" required="true"></textarea>
      </div>
      <hr>
      <div class="text-center">
        <div class="m-2">
          <strong>Total USD: {{total}}</strong>
        </div>
        <div class="m-2">
          <button type="submit">Salva fattura</button>
        </div>
      </div>
    </form>
  </div>
</template>
<script>
import freq from '@/request/Fattura'
import swal from 'sweetalert2'
export default {
  name: "NuovaFattura",
  data() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    var dueDate = new Date(today);
    dueDate.setDate(dueDate.getDate() + 20);
    return {
      form: {
        from: '',
        ship: '',
        bill: '',
        invoice: '',
        invoiceDate: dd + '/' + mm + '/' + yyyy,
        pd: '',
        dueDate: dueDate.getDate() + '/' + (dueDate.getMonth() + 1) + '/' + dueDate.getFullYear(),
        items: [],
        termsConditions: ''
      }
    };
  },
  computed: {
    total() {
      var total = 0;
      this.form.items.forEach(function(el) {
        total+=el.qty * el.uPrice;
      });
      return total;
    }
  },
  beforeCreate(){
    var vuec = this;
    freq.getOption(function(resp) {
      vuec.form.from = resp.data.data.from;
      vuec.form.ship = resp.data.data.ship;
      vuec.form.bill = resp.data.data.bill;
      vuec.form.termsConditions = resp.data.data.terms;
    });
  },
  methods: {
    newItem() {
      this.form.items.push({qty: 0, descrizione: '', uPrice: 0, tax: 0});
    },
    delItem(index) {
      this.form.items.splice(index,1);
    },
    creaFattura() {
      var vuec = this;
      var data = this.form;
      data.ship_to = data.ship;
      data.bill_to = data.bill;
      data.terms_conditions = data.termsConditions;
      data.due_date = data.dueDate;
      vuec.form.due_date = data.dueDate;
      vuec.form.date = data.invoiceDate;
      freq.create(data, function(resp) {
        if(resp.data.status === 'OK') {
          swal('Fattura create', 'La fattura e\' stata creata con successo!', 'success');
        } else {
          swal('Oops...', resp.data.message, 'error');
        }
      });
    }
  }
}
</script>
