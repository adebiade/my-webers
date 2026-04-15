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
      <!--<link href="{{asset('img/favicon.ico')}}" rel="icon">

      <!-- Google Web Fonts -->
      <!--<link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

      <!-- Icon Font Stylesheet -->
      <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
      <link href="{{asset('css/all.min.css')}}" rel="stylesheet">
     <link href="{{asset('font/bootstrap-icons.css')}}" rel="stylesheet">


      <!-- Libraries Stylesheet -->
    <!--  <link href="{{asset('animate/animate.min.css')}}" rel="stylesheet">
      <link href="{{asset('owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

      <!-- Customized Bootstrap Stylesheet -->
    <!--  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

      <!-- Template Stylesheet-->

      <link href="{{asset('css/style.css')}}" rel="stylesheet">
      <link rel="stylesheet"  href="{{asset('asmin/css/animate.min.css')}}">
      <link rel="stylesheet"  href="{{asset('asmin/css/animation.css')}}">
      <link rel="stylesheet" href="{{asset('asmin/css/bootstrap.css')}}">
      <link rel="stylesheet"  href="{{asset('asmin/css/bootstrap-select.min.css')}}">
      <link rel="stylesheet"  href="{{asset('asmin/css/style.css')}}">
      <link rel="stylesheet"  href="{{asset('asmin/font/fonts.css')}}">
      <link rel="stylesheet"  href="{{asset('asmin/icon/style.css')}}">
      <link rel="stylesheet" href="{{asset('asmin/css/sweetalert.min.css')}}">
      <link rel="stylesheet"  href="{{asset('asmin/css/custom.css')}}">

      @stack('styles')
  <!-- Scripts -->
</head>

<body class="body">
    <div id="wrapper">
        <div id="page" class="">
            <div class="layout-wrap">

                <!-- <div id="preload" class="preload-container">
    <div class="preloading">
        <span></span>
    </div>
</div> -->

                <div class="section-menu-left">
                    <div class="box-logo">
                        <a href="{{route('admin.index')}}" id="site-logo-inner">
                            <img class="" id="logo_header" alt="" src="{{asset('img/logo.png')}}"
                                data-light="{{asset('img/logo.png')}}" data-dark="{{asset('img/logo.png')}}">
                        </a>
                        <div class="button-show-hide">
                            <i class="icon-menu-left"></i>
                        </div>
                    </div>
                    <div class="center">
                        <div class="center-item">
                            <div class="center-heading">Main Home</div>
                            <ul class="menu-list">
                                <li class="menu-item">
                                    <a href="{{route('admin.index')}}" class="">
                                        <div class="icon"><i class="icon-grid"></i></div>
                                        <div class="text">Dashboard</div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="center-item">
                            <ul class="menu-list">
                                <li class="menu-item has-children">
                                    <a href="javascript:void(0);" class="menu-item-button">
                                        <div class="icon"><i class="icon-shopping-cart"></i></div>
                                        <div class="text">Properties</div>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="sub-menu-item ">
                                          <a href="{{route('admin.property.add')}}" class="btn btn-primary px-3 d-none d-lg-flex">Add Property</a>

                                            <!--<a href="add-product.html" class="">
                                                <div class="text">Add Product</div>
                                            </a>-->
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="{{route('admin.arpProduct')}}" class="">
                                                <div class="text">Appartment</div>
                                            </a>
                                        </li>

                                        <li class="sub-menu-item">
                                            <a href="{{route('admin.bldProduct')}}" class="">
                                                <div class="text">Building</div>
                                            </a>
                                        </li>

                                        <li class="sub-menu-item">
                                            <a href="{{route('admin.hmProduct')}}" class="">
                                                <div class="text">Home</div>
                                            </a>
                                        </li>

                                        <li class="sub-menu-item">
                                            <a href="{{route('admin.vlProduct')}}" class="">
                                                <div class="text">Villa</div>
                                            </a>
                                        </li>

                                        <li class="sub-menu-item">
                                            <a href="{{route('admin.offProduct')}}" class="">
                                                <div class="text">Office</div>
                                            </a>
                                        </li>

                                        <li class="sub-menu-item">
                                            <a href="{{route('admin.twnProduct')}}" class="">
                                                <div class="text">Townhouse</div>
                                            </a>
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="{{route('admin.grProduct')}}" class="">
                                                <div class="text">Garage</div>
                                            </a>
                                        </li>

                                        <li class="sub-menu-item">
                                            <a href="{{route('admin.shProduct')}}" class="">
                                                <div class="text">Shop</div>
                                            </a>
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="{{route('admin.agentform')}}" class="">
                                                <div class="text">Registered Agents</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <!--  <li class="menu-item has-children">
                                      <a href="javascript:void(0);" class="menu-item-button">
                                          <div class="icon"><i class="icon-layers"></i></div>
                                          <div class="text">Brand</div>
                                      </a>
                                      <ul class="sub-menu">
                                          <li class="sub-menu-item">
                                              <a href="add-brand.html" class="">
                                                  <div class="text">New Brand</div>
                                              </a>
                                          </li>
                                          <li class="sub-menu-item">
                                              <a href="brands.html" class="">
                                                  <div class="text">Brands</div>
                                              </a>
                                          </li>
                                      </ul>
                                  </li>-->
                                  <li class="menu-item has-children">
                                      <a href="javascript:void(0);" class="menu-item-button">
                                          <div class="icon"><i class="icon-layers"></i></div>
                                          <div class="text">Category</div>
                                      </a>
                                      <ul class="sub-menu">
                                          <li class="sub-menu-item">
                                              <a href="{{route('admin.category.add')}}" class="">
                                                  <div class="text">New Category</div>
                                              </a>
                                          </li>
                                          <li class="sub-menu-item">
                                              <a href="{{route('admin.categories')}}" class="">
                                                  <div class="text">Categories</div>
                                              </a>
                                          </li>
                                      </ul>
                                  </li>

                                  <li class="menu-item has-children">
                                      <a href="javascript:void(0);" class="menu-item-button">
                                          <div class="icon"><i class="icon-file-plus"></i></div>
                                          <div class="text">Order</div>
                                      </a>
                                      <ul class="sub-menu">
                                          <li class="sub-menu-item">
                                              <a href="orders.html" class="">
                                                  <div class="text">Orders</div>
                                              </a>
                                          </li>
                                          <li class="sub-menu-item">
                                              <a href="order-tracking.html" class="">
                                                  <div class="text">Order tracking</div>
                                              </a>
                                          </li>
                                      </ul>
                                  </li>
                                  <li class="menu-item">
                                      <a href="slider.html" class="">
                                          <div class="icon"><i class="icon-image"></i></div>
                                          <div class="text">Slider</div>
                                      </a>
                                  </li>
                                  <li class="menu-item">
                                      <a href="coupons.html" class="">
                                          <div class="icon"><i class="icon-grid"></i></div>
                                          <div class="text">Coupns</div>
                                      </a>
                                  </li>

                                  <li class="menu-item">
                                      <a href="users.html" class="">
                                          <div class="icon"><i class="icon-user"></i></div>
                                          <div class="text">User</div>
                                      </a>
                                  </li>
                                  <li class="menu-item">
                                      <a href="settings.html" class="">
                                          <div class="icon"><i class="icon-settings"></i></div>
                                          <div class="text">Settings</div>
                                      </a>
                                  </li>

                                  <li class="menu-item">
                                    <form method="POST" action="{{route('logout')}}" id="logout-form">
                                      @csrf
                                      <a href="{{route('logout')}}" class="" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                          <div class="icon"><i class="icon-settings"></i></div>
                                          <div class="text">Logout</div>
                                      </a>
                                    </form>
                                  </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="section-content-right">

                    <div class="header-dashboard">
                        <div class="wrap">
                            <div class="header-left">
                                <a href="index-2.html">
                                    <img class="" id="logo_header_mobile" alt="" src="{{asset('img/logo.png')}}"
                                        data-light="{{asset('img/logo.png')}}" data-dark="{{asset('img/logo.png')}}"
                                        data-width="154px" data-height="52px" data-retina="{{asset('img/logo.png')}}">
                                </a>
                                <div class="button-show-hide">
                                    <i class="icon-menu-left"></i>
                                </div>


                                <form class="form-search flex-grow">
                                    <fieldset class="name">
                                        <input type="text" placeholder="Search here..." class="show-search" name="name"
                                            tabindex="2" value="" aria-required="true" required="">
                                    </fieldset>
                                    <div class="button-submit">
                                        <button class="" type="submit"><i class="icon-search"></i></button>
                                    </div>
                                    <div class="box-content-search" id="box-content-search">
                                        <ul class="mb-24">
                                            <li class="mb-14">
                                                <div class="body-title">Top selling product</div>
                                            </li>
                                            <li class="mb-14">
                                                <div class="divider"></div>
                                            </li>
                                            <li>
                                                <ul>
                                                    <li class="product-item gap14 mb-10">
                                                        <div class="image no-bg">
                                                            <img src="images/products/17.png" alt="">
                                                        </div>
                                                        <div class="flex items-center justify-between gap20 flex-grow">
                                                            <div class="name">
                                                                <a href="product-list.html" class="body-text">Dog Food
                                                                    Rachael Ray Nutrish®</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-10">
                                                        <div class="divider"></div>
                                                    </li>
                                                    <li class="product-item gap14 mb-10">
                                                        <div class="image no-bg">
                                                            <img src="images/products/18.png" alt="">
                                                        </div>
                                                        <div class="flex items-center justify-between gap20 flex-grow">
                                                            <div class="name">
                                                                <a href="product-list.html" class="body-text">Natural
                                                                    Dog Food Healthy Dog Food</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-10">
                                                        <div class="divider"></div>
                                                    </li>
                                                    <li class="product-item gap14">
                                                        <div class="image no-bg">
                                                            <img src="images/products/19.png" alt="">
                                                        </div>
                                                        <div class="flex items-center justify-between gap20 flex-grow">
                                                            <div class="name">
                                                                <a href="product-list.html" class="body-text">Freshpet
                                                                    Healthy Dog Food and Cat</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <ul class="">
                                            <li class="mb-14">
                                                <div class="body-title">Order product</div>
                                            </li>
                                            <li class="mb-14">
                                                <div class="divider"></div>
                                            </li>
                                            <li>
                                                <ul>
                                                    <li class="product-item gap14 mb-10">
                                                        <div class="image no-bg">
                                                            <img src="images/products/20.png" alt="">
                                                        </div>
                                                        <div class="flex items-center justify-between gap20 flex-grow">
                                                            <div class="name">
                                                                <a href="product-list.html" class="body-text">Sojos
                                                                    Crunchy Natural Grain Free...</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-10">
                                                        <div class="divider"></div>
                                                    </li>
                                                    <li class="product-item gap14 mb-10">
                                                        <div class="image no-bg">
                                                            <img src="images/products/21.png" alt="">
                                                        </div>

                                                    </li>
                                                    <li class="mb-10">
                                                        <div class="divider"></div>
                                                    </li>
                                                    <li class="product-item gap14 mb-10">
                                                        <div class="image no-bg">
                                                            <img src="images/products/22.png" alt="">
                                                        </div>
                                                        <div class="flex items-center justify-between gap20 flex-grow">
                                                            <div class="name">
                                                                <a href="product-list.html" class="body-text">Mega
                                                                    Pumpkin Bone</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-10">
                                                        <div class="divider"></div>
                                                    </li>
                                                    <li class="product-item gap14">
                                                        <div class="image no-bg">
                                                            <img src="images/products/23.png" alt="">
                                                        </div>
                                                        <div class="flex items-center justify-between gap20 flex-grow">
                                                            <div class="name">
                                                                <a href="product-list.html" class="body-text">Mega
                                                                    Pumpkin Bone</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </form>

                            </div>
                            <div class="header-grid">

                                <div class="popup-wrap message type-header">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="header-item">
                                                <span class="text-tiny">1</span>
                                                <i class="icon-bell"></i>
                                            </span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end has-content"
                                            aria-labelledby="dropdownMenuButton2">
                                            <li>
                                                <h6>Notifications</h6>
                                            </li>
                                            <li>
                                                <div class="message-item item-1">
                                                    <div class="image">
                                                        <i class="icon-noti-1"></i>
                                                    </div>
                                                    <div>
                                                        <div class="body-title-2">Discount available</div>
                                                        <div class="text-tiny">Morbi sapien massa, ultricies at rhoncus
                                                            at, ullamcorper nec diam</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="message-item item-2">
                                                    <div class="image">
                                                        <i class="icon-noti-2"></i>
                                                    </div>
                                                    <div>
                                                        <div class="body-title-2">Account has been verified</div>
                                                        <div class="text-tiny">Mauris libero ex, iaculis vitae rhoncus
                                                            et</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="message-item item-3">
                                                    <div class="image">
                                                        <i class="icon-noti-3"></i>
                                                    </div>
                                                    <div>
                                                        <div class="body-title-2">Order shipped successfully</div>
                                                        <div class="text-tiny">Integer aliquam eros nec sollicitudin
                                                            sollicitudin</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="message-item item-4">
                                                    <div class="image">
                                                        <i class="icon-noti-4"></i>
                                                    </div>
                                                    <div>
                                                        <div class="body-title-2">Order pending: <span>ID 305830</span>
                                                        </div>
                                                        <div class="text-tiny">Ultricies at rhoncus at ullamcorper</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li><a href="#" class="tf-button w-full">View all</a></li>
                                        </ul>
                                    </div>
                                </div>




                                <div class="popup-wrap user type-header">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="header-user wg-user">
                                                <span class="flex flex-column">
                                                    <span class="text-tiny">Admin</span>
                                                </span>
                                            </span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end has-content"
                                            aria-labelledby="dropdownMenuButton3">
                                            <li>
                                                <a href="#" class="user-item">
                                                    <div class="icon">
                                                        <i class="icon-user"></i>
                                                    </div>
                                                    <div class="body-title-2">Account</div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="user-item">
                                                    <div class="icon">
                                                        <i class="icon-mail"></i>
                                                    </div>
                                                    <div class="body-title-2">Inbox</div>
                                                    <div class="number">27</div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="user-item">
                                                    <div class="icon">
                                                        <i class="icon-file-text"></i>
                                                    </div>
                                                    <div class="body-title-2">Taskboard</div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="user-item">
                                                    <div class="icon">
                                                        <i class="icon-headphones"></i>
                                                    </div>
                                                    <div class="body-title-2">Support</div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="login.html" class="user-item">
                                                    <div class="icon">
                                                        <i class="icon-log-out"></i>
                                                    </div>
                                                    <div class="body-title-2">Log out</div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="main-content">
                         @yield('content')

                        <div class="bottom-page">
                            <div class="body-text">Copyright © 2024 Forstates</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('js/sweetalert.min.js')}}"></script>
    <script src="{{asset('js/apexcharts/apexcharts.js')}}"></script>
    <script src="{{asset('js/mains.js')}}"></script>
    <script>
        (function ($) {

            var tfLineChart = (function () {

                var chartBar = function () {

                    var options = {
                        series: [{
                            name: 'Total',
                            data: [0.00, 0.00, 0.00, 0.00, 0.00, 273.22, 208.12, 0.00, 0.00, 0.00, 0.00, 0.00]
                        }, {
                            name: 'Pending',
                            data: [0.00, 0.00, 0.00, 0.00, 0.00, 273.22, 208.12, 0.00, 0.00, 0.00, 0.00, 0.00]
                        },
                        {
                            name: 'Delivered',
                            data: [0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00]
                        }, {
                            name: 'Canceled',
                            data: [0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00]
                        }],
                        chart: {
                            type: 'bar',
                            height: 325,
                            toolbar: {
                                show: false,
                            },
                        },
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: '10px',
                                endingShape: 'rounded'
                            },
                        },
                        dataLabels: {
                            enabled: false
                        },
                        legend: {
                            show: false,
                        },
                        colors: ['#2377FC', '#FFA500', '#078407', '#FF0000'],
                        stroke: {
                            show: false,
                        },
                        xaxis: {
                            labels: {
                                style: {
                                    colors: '#212529',
                                },
                            },
                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        },
                        yaxis: {
                            show: false,
                        },
                        fill: {
                            opacity: 1
                        },
                        tooltip: {
                            y: {
                                formatter: function (val) {
                                    return "$ " + val + ""
                                }
                            }
                        }
                    };

                    chart = new ApexCharts(
                        document.querySelector("#line-chart-8"),
                        options
                    );
                    if ($("#line-chart-8").length > 0) {
                        chart.render();
                    }
                };

                /* Function ============ */
                return {
                    init: function () { },

                    load: function () {
                        chartBar();
                    },
                    resize: function () { },
                };
            })();

            jQuery(document).ready(function () { });

            jQuery(window).on("load", function () {
                tfLineChart.load();
            });

            jQuery(window).on("resize", function () { });
        })(jQuery);
    </script>
    @stack('scripts')

</body>
</html>
