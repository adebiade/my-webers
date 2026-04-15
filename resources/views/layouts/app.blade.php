
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'RealEstate') }}</title>

    <meta charset="utf-8">
      <title>Forstates - Real Estate company, structure, buillding, Appartment, Rooms for rents, House for sale, Shops for rent, Office for rent,Tower,Prestigious homes,Prestigious Mansion,Luxury homes,Luxury Mansion</title>
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <meta content="" name="keywords">
      <meta content="" name="description">

      <!-- Favicon -->
      <link href="{{asset('img/favicon.ico')}}" rel="icon">

      <!-- Google Web Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

      <!-- Icon Font Stylesheet -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
      <link href="{{asset('css/all.min.css')}}" rel="stylesheet">
     <link href="{{asset('font/bootstrap-icons.css')}}" rel="stylesheet">


      <!-- Libraries Stylesheet -->
      <link href="{{asset('animate/animate.min.css')}}" rel="stylesheet">
      <link href="{{asset('owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

      <!-- Customized Bootstrap Stylesheet -->
      <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

      <!-- Template Stylesheet -->
      <link href="{{asset('css/style.css')}}" rel="stylesheet">
      <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
       integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">-->
      <style>
         img {
           overflow-y:hidden;
             margin: .25rem;
             }
      </style>
      @stack('styles')

    <!-- Scripts -->
</head>



<body style="background-color:#fff;">
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
              /<!--  <span class="sr-only">Loading...</span>-->
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="{{route('home.index')}}" class="navbar-brand d-flex align-items-center text-center">
                    <div>
                        <img src="{{asset('img/logo.png')}}" alt=logo>
                    </div>
                    <h1 class="m-0 text-primary" style="font-size:65px;">Forstates</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="{{route('home.index')}}" class="nav-item nav-link active">Home</a>
                        <a href="{{route('inquiryAboutUs.index')}}" class="nav-item nav-link">About us</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Property</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="{{route('inquiry.index')}}" class="dropdown-item" style="font-size:15px;">Appartment</a>
                                <a href="{{route('inquiryTwo.index')}}" class="dropdown-item" style="font-size:15px;">Villa</a>
                                <a href="{{route('inquiryFour.index')}}" class="dropdown-item" style="font-size:15px;">Office</a>
                                <a href="{{route('inquiryOne.index')}}" class="dropdown-item" style="font-size:15px;">Building</a>
                                <a href="{{route('inquiryThree.index')}}" class="dropdown-item" style="font-size:15px;">Home</a>
                                <a href="{{route('inquiryFive.index')}}" class="dropdown-item" style="font-size:15px;">Shops</a>
                                <a href="{{route('inquirySeven.index')}}" class="dropdown-item" style="font-size:15px;">Garage</a>
                                <a href="{{route('inquirySix.index')}}" class="dropdown-item" style="font-size:15px;">TownHouse</a>
                                <a href="{{route('home.index')}}" class="dropdown-item" style="font-size:15px;">Agents</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="testimonial.html" class="dropdown-item" style="font-size:15px;">Testimonial</a>
                              <!--  <a href="404.html" class="dropdown-item">404 Error</a>-->
                            </div>
                        </div>
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                    </div>
                    @guest
                    <div><a href="{{route('login')}}"class="fa fa-user text-primary me-2"></a></div>
                    @else
                    <div style="font-size:15px;"><a href="{{Auth::user()->utype==='ADM' ? route('admin.index'): route('user.index')}}"class="fa fa-user text-primary me-2">
                           <span class="text-primary">{{Auth::user()->name}}</span>
                    </a>
                  </div>
                    @endguest
                    <a href="{{route('user.property.add')}}" class="btn btn-primary px-3 d-none d-lg-flex" style="font-size:15px;">Add Property</a>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->


          @yield('content')

          <!-- Footer Start -->
          <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
              <div class="container py-5">
                  <div class="row g-5">
                      <div class="col-lg-3 col-md-6">
                          <h5 class="text-white mb-4">Get In Touch</h5>
                          <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                          <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                          <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                          <div class="d-flex pt-2">
                              <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                              <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                              <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                              <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-6">
                          <h5 class="text-white mb-4">Quick Links</h5>
                          <a class="btn btn-link text-white-50" href="">About Us</a>
                          <a class="btn btn-link text-white-50" href="">Contact Us</a>
                          <a class="btn btn-link text-white-50" href="">Our Services</a>
                          <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                          <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
                      </div>
                      <div class="col-lg-3 col-md-6">
                          <h5 class="text-white mb-4">Photo Gallery</h5>
                          <div class="row g-2 pt-2">
                              <div class="col-4">
                                  <img class="img-fluid rounded bg-light p-1" src="{{asset('img/property-1.jpg')}}" alt="">
                              </div>
                              <div class="col-4">
                                  <img class="img-fluid rounded bg-light p-1" src="{{asset('img/property-2.jpg')}}" alt="">
                              </div>
                              <div class="col-4">
                                  <img class="img-fluid rounded bg-light p-1" src="{{asset('img/property-3.jpg')}}" alt="">
                              </div>
                              <div class="col-4">
                                  <img class="img-fluid rounded bg-light p-1" src="{{asset('img/property-4.jpg')}}" alt="">
                              </div>
                              <div class="col-4">
                                  <img class="img-fluid rounded bg-light p-1" src="{{asset('img/property-5.jpg')}}" alt="">
                              </div>
                              <div class="col-4">
                                  <img class="img-fluid rounded bg-light p-1" src="{{asset('img/property-6.jpg')}}" alt="">
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-6">
                          <h5 class="text-white mb-4">Newsletter</h5>
                          <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                          <div class="position-relative mx-auto" style="max-width: 400px;">
                              <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                              <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="container">
                  <div class="copyright">
                      <div class="row">
                          <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                              &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.

                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                          </div>
                          <div class="col-md-6 text-center text-md-end">
                              <div class="footer-menu">
                                  <a href="">Home</a>
                                  <a href="">Cookies</a>
                                  <a href="">Help</a>
                                  <a href="">FQAs</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Footer End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="{{asset('jQuery/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('wow/wow.min.js')}}"></script>
    <script src="{{asset('easing/easing.min.js')}}"></script>
    <script src="{{asset('waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('js/main.js')}}"></script>
    @stack('scripts')
</body>
</html>
