<template>
  <nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <router-link to="/">
            <a class="nav-link" href="#">
              <span data-feather="home"></span>
              Info <span class="sr-only">(current)</span>
            </a>
        </router-link>
        </li>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Progetti</span>
          <a class="d-flex align-items-center text-muted" href="#">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <li class="nav-item">
          <router-link to="/progetti">
            <a class="nav-link" href="#">
              Elenco progetti
            </a>
          </router-link>
        </li>
        <li class="nav-item">
          <router-link to="/nuovo_progetto">
            <a class="nav-link" href="#">
              Nuovo progetto
            </a>
          </router-link>
        </li>
        <li class="nav-item">
          <router-link to="/impostazioni_progetto">
            <a class="nav-link" href="#">
              Impostazioni progetto
            </a>
          </router-link>
        </li>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Media</span>
          <a class="d-flex align-items-center text-muted" href="#">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <li class="nav-item">
          <router-link to="/media">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Elenco media
            </a>
          </router-link>
        </li>
        <li class="nav-item">
          <router-link to="/media/upload">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Upload media
            </a>
          </router-link>
        </li>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Fatture</span>
          <a class="d-flex align-items-center text-muted" href="#">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <li class="nav-item">
          <router-link to="/fatture">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Elenco fatture
            </a>
          </router-link>
        </li>
        <li class="nav-item">
          <router-link to="/nuova_fattura">
            <a class="nav-link" href="#">
              Nuova fattura
            </a>
          </router-link>
        </li>
        <li class="nav-item">
          <router-link to="/impostazioni_fatture">
            <a class="nav-link" href="#">
              Impostazioni fatture
            </a>
          </router-link>
        </li>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Profilo</span>
          <a class="d-flex align-items-center text-muted" href="#">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <li class="nav-item">
          <router-link to="/profilo">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Gestione profilo
            </a>
          </router-link>
        </li>
      </ul>
    </div>
  </nav>
</template>
<script>
  export default {
    name: 'SideBar'
  }
</script>
