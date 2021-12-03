<template>
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <inertia-link :href="route('admin.dashboard.index')" class="brand-link">
      <!--<img :src="'../storage/images/AdminLTELogo.png'" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">-->
      <span class="brand-text font-weight-light">Payconvert</span>
    </inertia-link>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="sidebar-user p-3">
        <div class="image">
          <img :src="'storage/upload/avatars/' + `${ $page.props.user.avatar }`" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info pt-2">
          <a href="#" class="d-block">{{ $page.props.user.username }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                         <li class="nav-header">PRINCIPAL</li>

          <li class="nav-item">
            <inertia-link :href="route('dashboard')" class="nav-link" :class="urlPath == '/dashboard' ? 'active' : '' ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </inertia-link>
          </li>
          <li class="nav-item">
            <inertia-link :href="route('profil_convertir')" class="nav-link" :class="urlPath == '/convert' ? 'active' : '' ">
              <i class="nav-icon fas fa-home"></i>
              <p>
                  Convertir
              </p>
            </inertia-link> 
          </li>   
          <li class="nav-item" :class="urlPath == '/profil' || urlPath == '/integration' ? 'menu-open' : ''">
          <a href="#" class="nav-link" :class="urlPath == '/profil' ? 'active' : ''">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Votre compte
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <inertia-link :href="route('profil_setting')" class="nav-link" :class="urlPath == '/profil' ? 'active' : '' ">
                <i class="far fa-circle nav-icon"></i>
                <p>Général</p>
              </inertia-link> 
            </li>
            <li class="nav-item">
              <inertia-link :href="route('profil_integration')" class="nav-link" :class="urlPath == '/integration' ? 'active' : '' ">
                <i class="far fa-circle nav-icon"></i>
                <p>Intégration</p>
              </inertia-link> 
            </li>
          </ul>
        </li>
          <li class="nav-header">SITE</li>
          <li class="nav-item">
            <a :href="route('home')" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                  Retour au site
              </p>
            </a> 
          </li>          
          <li class="nav-item">
            <a class="nav-link" href="/logout"
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                 <i class="nav-icon fas fa-sign-out-alt"></i>
                 <p >Déconnexion</p>
            </a>
                 <form id="logout-form" action="/logout" method="POST" style="display: none;"> <input type="hidden" name="_token" :value="csrf">
                </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</template>

<script>
export default {
    computed: {
        csrf() {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        },
    },
    data() {
      return {
        urlPath: location.pathname,
      }
    },
    
}
</script>