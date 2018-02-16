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
              <button>
                Apri
              </button>
              <button>
                Modifica
              </button>
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
  import ProgettoController from '@/controller/ProgettoController'
  export default {
    name: 'ProgettiPage',
    beforeCreate() {
      var module = this;
      ProgettoController.getAll(function(data){
        module.progetti = data;
      });
    },
    data() {
      return {
        progetti:[
          {
            id: 0,
            nome: "DemoName1"
          },
          {
            id: 1,
            nome: "DemoName2"
          },
          {
            id: 2,
            nome: "DemoName3"
          }
        ]
      }
    }
  }
</script>
