<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PayConvert</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased bg-white">
        <nav id="navbar_top" class="navbar navbar-light top-0 z-50 fixed navbar-expand-lg custom-nav fixed-top">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Toggle button -->
                <button
                class="navbar-toggler"
                type="button"
                data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
                >
                <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0 px-4" href="#">
                    <img
                    src="storage/images/logoPSCs.svg"
                    height="15"
                    alt=""
                    loading="lazy"
                    />
                </a>
                <!-- Left links -->
                <ul class="navbar-nav mb-2 mb-lg-0 pe-5" id="nav">
                    <li class="nav-item px-2">
                    <a class="navbar-brand fw-bold active" aria-current="page" href="#header">Accueil</a>
                    </li>
                    <li class="nav-item px-2">
                    <a class="navbar-brand fw-bold" href="#service">A Propos</a>
                    </li>
                    <li class="nav-item px-2">
                    <a class="navbar-brand fw-bold" href="#footer">Contact</a>
                    </li>
                </ul>
                <!-- Left links -->
                @if (Route::has('login'))
                    @auth
                    <div class="container-fluid">
                        <ul class="navbar-nav justify-content-end">
                            <!-- Avatar -->
                            <li class="nav-item dropdown ">
                                <a
                                class="nav-link dropdown-toggle d-flex align-items-center"
                                href="#"
                                id="navbarDropdownMenuLink"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                                >
                                <img
                                    src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg"
                                    class="rounded-circle"
                                    height="22"
                                    alt=""
                                    loading="lazy"
                                />
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="#">Convertir</a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                         @csrf
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Deconnexion</a>
                                    </form>
                                    
                                </li>
                                </ul>
                            </li>
                            </ul>
                    </div>
                            <!-- Right elements -->
                        <!--<a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>-->
                    @else
                        <a class="navbar-brand purplecolor fw-bold" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Connexion</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn me-3 purplecolorbg fw-bold mb-0">S'enregistrer</a>
                        @endif
                    @endauth
                </div>
                @endif
                </div>
            </div>
            <!-- Container wrapper -->

            <!--
            <form class="container-fluid justify-content-start">
                <a href="{{ route('admin.dashboard.index') }}" class="btn btn-dark">Admin Panel</a>
            </form>
            -->
          </nav>

        <header id="header" class="header">
            <div class="header-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="text-container">
                                <h1 class="fw-bold  pb-3"><span class="primarycolor bold">Convertissez vos cartes Paysafecard</span> <span class="secondarycolor">en argent PayPal<span></h1>
                                    <button type="button" class="btn rounded-pill btn-SecondaryColor fw-bold text-white pe-4">
                                        <span class="btn-label nobg ms-2"><i class="fas fa-money-bill-wave"></i> </span>Convertissez dès maintenant</button>
                            </div> <!-- end of text-container -->
                        </div> <!-- end of col -->
                        <div class="col-lg-6">
                            <div class="image-container">
                                <img class="img-fluid" src="storage/images/undraw_Mobile_pay_re_sjb8.svg" alt="alternative">
                            </div> <!-- end of image-container -->
                        </div> <!-- end of col -->
                    </div> <!-- end of row -->
                </div> <!-- end of container -->
            </div>
        </header>

        <div class="section md-padding bg-white mt-5 anchor" id="service-bg">

            <!-- Container -->
            <div class="container">
    
                <!-- Row -->
                <div class="row">
    
                    <!-- Section header -->
                    <div class="col-lg-12 text-center">
                        <h1 class="thing-with-anchor title primarycolor fw-bold" id="service">Services</h1>
                        <p class="p-heading p-large">Depuis 2021, notre priorité est de proposer un service fiable et rapide ainsi qu'une interface simple d'utilisation.</p>
                    </div>
                    <!-- /Section header -->

                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <div class="card text-center border0 shadow-cards card-width-radius zoom">
                                <div class="card-body">
                                    <div class="circle-image mt-4" id="circleimg-card-1">
                                        <img class="card-image cardimg" src="storage/images/cadenas.png" alt="alternative">
                                    </div>
                                    <h4 class="card-title secondarycolor fw-bold">Service Sécurisé</h4>
                                    <p class="card-text-color">Convertissez en toute sénérité via votre espace client. Chaque code et transaction est crypté et sécurisé dès son envoi.</p>
                                    <div class="color-bar-end" id="color-bar-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card text-center border0 shadow-cards card-width-radius zoom" id="middle-card">
                                <div class="card-body">
                                    <div class="circle-image mt-4" id="circleimg-card-2">
                                        <img class="card-image cardimg" src="storage/images/rush.png" alt="alternative">
                                    </div>
                                    <h4 class="card-title secondarycolor fw-bold">Service ultra rapide 24H</h4>
                                    <p class="card-text-color">Vos fonds seront transferés automatiquement en 24H maximum sur votre compte PayPal</p>
                                    <div class="color-bar-end" id="color-bar-2"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card text-center border0 shadow-cards card-width-radius zoom">
                                <div class="card-body">
                                    <div class="circle-image mt-4" id="circleimg-card-3">
                                        <img class="card-image cardimg" id="cardimg-3" src="storage/images/aide.png" alt="alternative">
                                    </div>
                                    <h4 class="card-title secondarycolor fw-bold">Service assistance 24H</h4>
                                    <p class="card-text-color">En cas de problème l'assistance vous soutiendra en moins de 24 H</p>
                                    <div class="color-bar-end" id="color-bar-3"></div>
                                </div>
                            </div>
                        </div>

                           
                    </div>
        
    
                </div>
                <!-- /Row -->

            </div>
            <!-- /Container -->
    
            
        </div>

<!-- Footer -->
<footer class="text-center text-lg-start text-muted" id="footer">
    <!-- Section: Social media -->
    <section
      class="d-flex justify-content-center justify-content-lg-between p-4 "
    >

    
    </section>
    <!-- Section: Social media -->
  
    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-13">
        <!-- Grid row -->
        <div class="row mt-3 align-items-end text-dark">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4 text-center">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
                <i class="fas fa-credit-card me-2"></i>PayConvert
            </h6>
            <p>
                PayConvert est un service fiable, rapide et sécurisé de convertissement  de cartes PaySafeCard en argent PayPal.
            </p>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
         
  
          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 text-center mt-10">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Contact
            </h6>
            <p><i class="fas fa-home me-3"></i>Le Puy-en-Velay, FR</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              Contact@PayConvert.com
            </p>
            <p><i class="fas fa-phone me-3"></i> + 33 04 71 09 90 80</p>
            <!--<p><i class="fas fa-print me-3"></i> Null</p>-->
          </div>

        <!-- Section: Social media -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 d-flex align-items-center pb-5">        <!-- Facebook -->
        <a class="btn btn-dark btn-outline-light border-1 border-dark btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-facebook-f"></i
        ></a>
  
        <!-- Twitter -->
        <a class="btn btn-dark btn-outline-light border-1 border-dark btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-twitter"></i
        ></a>
  
        <!-- Linkedin -->
        <a class="btn btn-dark btn-outline-light border-1 border-dark btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-linkedin-in"></i
        ></a>
  
        <!-- Github -->
        <a class="btn btn-dark btn-outline-light border-1 border-dark btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-github"></i
        ></a>
      </div>
      <!-- Section: Social media -->
  
          <!-- Grid column -->
        </div>
        <!-- Grid rows -->
      </div>
    </section>
    <!-- Section: Links  -->
  
    <!-- Copyright -->
    <div class="text-center p-4 text-dark">
      © 2021 Copyright:
      <a class="text-reset fw-bold" href="https://PayConvert.com/">PayConvert.com</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Connexion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            @if ($errors->any())
                <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                             <strong>{{ $error }}</strong>
                        @endforeach
                </div>
            @endif


            <!-- Email Address -->
            <div class="form-group">
                <x-label for="email" :value="__('Email')" />

                <input id="email" type="email" class="block mt-1 w-full form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <input id="password" type="password" class="block mt-1 w-full form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-3 btn btn-secondary btn-SecondaryColor">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    <script src="{{ asset('js/app.js') }}"></script>


@if($errors->has('email') || $errors->has('password'))
    <script>
    $(function() {
        $('#loginModal').modal('show');
    });
    </script>
@endif

    </body>
</html>


<script>
    document.addEventListener("DOMContentLoaded", function(){
      window.addEventListener('scroll', function() {
          if (window.scrollY > 60) {
            document.getElementById('navbar_top').classList.add('shadow-cards', 'bg-white', 'navbar-collaps');
          } else {
            document.getElementById('navbar_top').classList.remove('shadow-cards', 'bg-white', 'navbar-collaps');
          } 
      });
    }); 

    // Get the container element
    var textItems = document.getElementsByClassName("navbar-brand");

    // Loop through the buttons and add the active class to the current/clicked button
    for (var i = 0; i < textItems.length; i++) {
        textItems[i].addEventListener("click", function() {
            console.log("sa");
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
        });
    }
</script>