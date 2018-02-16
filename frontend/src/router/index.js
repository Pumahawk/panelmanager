import Vue from 'vue'
import Router from 'vue-router'
import DemoDashboard from '@/components/DemoDashboard'
import ProgettiPage from '@/components/ProgettiPage'
import ProgettoPage from '@/components/ProgettoPage'
import FatturePage from '@/components/FatturePage'
import ProfilePage from '@/components/ProfilePage'
import NuovoProgetto from '@/components/NuovoProgetto'
import NuovaFattura from '@/components/NuovaFattura'
import ImpostazioniFatture from '@/components/ImpostazioniFatture'
import ImpostazioniProgettoPage from '@/components/ImpostazioniProgettoPage'

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
    }
  ]
})
