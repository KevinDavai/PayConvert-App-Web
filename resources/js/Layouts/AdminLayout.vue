<template>
    <div class="dark-mode">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> 

  <!-- Navbar -->
    <NavBar />
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    <SideBar />

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
              <slot name="header"></slot>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
        <slot></slot>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
    <Footer />
</div>
</div>
</template>

<script>
    import Footer from '@/Components/Admin/Footer'
    import NavBar from '@/Components/Admin/NavBar'
    import SideBar from '@/Components/Admin/SideBar'
    export default {
        components: {
          Footer,
          NavBar,
          SideBar,
        },
        mounted: function() {
          this.init();
        },
        methods: {
          init() {
            let SELECTOR_LOADER = '.loader' 
            setTimeout(() => {
              let $loader = $(SELECT_LOADER)
              console.log($loader)
              if($loader) {
                $loader.css('height', 0)
                setTimeout(() => {
                  $loader.children().hide() 
                }, 2000)
              }
            }, 2000)
          }
        },
    }

</script>