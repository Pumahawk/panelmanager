import Vue from 'vue'
import Router from 'vue-router'
import DemoDashboard from '@/components/pages/DemoDashboard'
import ProgettiPage from '@/components/pages/Progetti'
import ProgettoPage from '@/components/pages/Progetto'
import FatturePage from '@/components/pages/Fatture'
import ProfilePage from '@/components/pages/Profile'
import NuovoProgetto from '@/components/pages/NuovoProgetto'
import NuovaFattura from '@/components/pages/NuovaFattura'
import ImpostazioniFatture from '@/components/pages/ImpostazioniFatture'
import ImpostazioniProgettoPage from '@/components/pages/ImpostazioniProgetto'
import ModificaProgettoPage from '@/components/pages/ModificaProgetto'
Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      component: DemoDashboard
    },
    {
      path: '/progetti',
      component: ProgettiPage
    },
    {
      path: '/impostazioni_progetto',
      component: ImpostazioniProgettoPage
    },
    {
      path: '/fatture',
      component: FatturePage
    },
    {
      path: '/profilo',
      component: ProfilePage
    },
    {
      path: '/nuovo_progetto',
      component: NuovoProgetto
    },
    {
      path: '/nuova_fattura',
      component: NuovaFattura
    },
    {
      path: '/impostazioni_fatture',
      component: ImpostazioniFatture
    },
    {
      name: 'progetto',
      path: '/progetto/:id',
      component: ProgettoPage
    },
    {
      name: 'progettoEdit',
      path: '/progetto/edit/:id',
      component: ModificaProgettoPage
    }
  ]
})
