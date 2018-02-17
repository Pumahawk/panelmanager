<template>
  <div>
    <h2>Elenco progetti</h2>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <td>
              ID
            </td>
            <td>
              Nome
            </td>
            <td>
              Azioni
            </td>
          </tr>
        </thead>
        <tbody>
          <tr v-for="progetto in progetti">
            <td>
              {{progetto.id}}
            </td>
            <td>
              {{progetto.nome}}
            </td>
            <td>
              <router-link :to="{ name: 'progetto', params: {id: progetto.id} }">
                <button>
                  Apri
                </button>
              </router-link>
              <button>
                Cancella
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
<script>
  import ProgettoRequest from '@/request/Progetto'
  export default {
    name: 'ProgettiPage',
    beforeCreate() {
      var module = this;
      ProgettoRequest.getAll(function(resp){
        module.progetti = resp.data.data;
      });
    },
    data() {
      return {
        progetti: null
      }
    }
  }
</script>
