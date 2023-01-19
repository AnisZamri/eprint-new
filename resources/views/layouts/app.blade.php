<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->

    <link rel="stylesheet" href="{{asset('cust/assets/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('cust/assets/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('cust/assets/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('cust/assets/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('cust/assets/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('cust/assets/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('cust/assets/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('cust/assets/css/style.css')}}" type="text/css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
   

      <!-- Favicon -->
      <link href="{{asset('backend/assets/img/favicon.png')}}" rel="icon">
     <link href="{{asset('backend/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    
     <!-- Fonts -->
     <link href="https://fonts.gstatic.com" rel="preconnect">
     <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  

    <!-- Vendors CSS -->
    <link href=" {{asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href=" {{asset('backend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href=" {{asset('backend/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href=" {{asset('backend/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href=" {{asset('backend/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href=" {{asset('backend/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href=" {{asset('backend/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">


   <!-- Template Main CSS File -->
   <link href="  {{asset('backend/assets/css/style.css')}}" rel="stylesheet">

    @livewireStyles

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
</head>
<body>
    <div id="app">

    @if(auth()->user()->is_admin != true)

        <!-- Header Section Begin -->
        <header class="header">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-xl-3 col-lg-2">
                        <div class="header__logo">
                            <a href="{{asset('staff/assets/img/abLogo.png')}}"><img src="{{asset('staff/assets/img/abLogo.png')}}"  style=" margin-top:-10px; margin-bottom:-30px; height:70px;"alt=""></a>

                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-7">
                        <nav class="header__menu">
                            <ul>
                                <li class="active"><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="">Products</a></li>
                                    
                                @if (Route::has('login'))
                                    @auth
                                    <li><a class="nav-link" href="{{ route('inbox.index') }}">Chat</a></li>

                                    <li><a href="{{ route('custViewOrder') }}">Orders</a></li>

                                    
                                            <li><a href="{{ url('customers/profile/')}}">PROFILE</a></li>
                                            <!-- <li><a href="{{ url('customers/editprofile/')}}">EDIT PROFILE</a></li> -->

                                    

                                        <li><a  href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                        </a></li>
                
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>

                                            @else

                                            <li><a href="./contact.html">Contact</a></li>

                                                <div class="header__right__auth">
                                                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                                            
                                                    @if (Route::has('register'))
                                                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                                    @endif
                                                </div>


                                    @endauth
                                @endif



                                <div class="header__right__widget" >

                                    <ul class="offcanvas__widget" >

                                        <div class="dropdown" >

                                            <i class="icon_bag_alt" data-toggle="dropdown"aria-hidden="true"></i>  
                                            <span class="tip">{{ count((array) session('cart')) }}</span>
                                        

                                            <div class="dropdown-menu">
                                                <div class="row total-header-section">
                                                    @php $total = 0 @endphp
                                                    @foreach((array) session('cart') as $id => $details)
                                                        @php $total += $details['price'] * $details['quantity'] @endphp

                                                        
                                                    @endforeach
                                                    <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                                                        <p>Total Price: <span class="text-info">RM {{ $total }}</span></p>
                                                    </div>
                                                
                                                </div>

                                                @if(session('cart'))
                                                    @foreach(session('cart') as $id => $details)
                                                        <div class="row cart-detail">
                                                            <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                                            <img src="{{asset($details['photo'])}}" />
                                                            </div>
                                                            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                                                <p>{{ $details['product_name'] }}</p>
                                                                <span class="price text-info">RM{{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif

                                                <div class="row">
                                                    <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                                        <a href="{{ route('viewCartTest') }}" class="btn btn-primary btn-block">View all</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </ul>
                                </div>

                            </ul>
                        </nav>
                    </div>

                

                                                
                </div>
            </div>
    </header>
        @else
          
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">

        <div class="img_container3">
            <img src=" {{asset('staff/assets/img/abLogo.png')}}" style=" margin-top:8px; height:50px;" >
            </div>



        <span class="app-brand-text  menu-text fw-bolder " style="margin-left:5px; font-size: 20px;" >Abagus E-Print</span>
        </a>

        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Search" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
            <a class="nav-link nav-icon search-bar-toggle " href="#">
                <i class="bi bi-search"></i>
            </a>
            </li><!-- End Search Icon-->

            <li class="nav-item dropdown">

            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                <i class="bi bi-bell"></i>
                <span class="badge bg-primary badge-number">4</span>
            </a><!-- End Notification Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                <li class="dropdown-header">
                You have 4 new notifications
                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                </li>
                <li>
                <hr class="dropdown-divider">
                </li>

                <li class="notification-item">
                <i class="bi bi-exclamation-circle text-warning"></i>
                <div>
                    <h4>Lorem Ipsum</h4>
                    <p>Quae dolorem earum veritatis oditseno</p>
                    <p>30 min. ago</p>
                </div>
                </li>

                <li>
                <hr class="dropdown-divider">
                </li>

                <li class="notification-item">
                <i class="bi bi-x-circle text-danger"></i>
                <div>
                    <h4>Atque rerum nesciunt</h4>
                    <p>Quae dolorem earum veritatis oditseno</p>
                    <p>1 hr. ago</p>
                </div>
                </li>

                <li>
                <hr class="dropdown-divider">
                </li>

                <li class="notification-item">
                <i class="bi bi-check-circle text-success"></i>
                <div>
                    <h4>Sit rerum fuga</h4>
                    <p>Quae dolorem earum veritatis oditseno</p>
                    <p>2 hrs. ago</p>
                </div>
                </li>

                <li>
                <hr class="dropdown-divider">
                </li>

                <li class="notification-item">
                <i class="bi bi-info-circle text-primary"></i>
                <div>
                    <h4>Dicta reprehenderit</h4>
                    <p>Quae dolorem earum veritatis oditseno</p>
                    <p>4 hrs. ago</p>
                </div>
                </li>

                <li>
                <hr class="dropdown-divider">
                </li>
                <li class="dropdown-footer">
                <a href="#">Show all notifications</a>
                </li>

            </ul><!-- End Notification Dropdown Items -->

            </li><!-- End Notification Nav -->

            <li class="nav-item dropdown">

            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                <i class="bi bi-chat-left-text"></i>
                <span class="badge bg-success badge-number">3</span>
            </a><!-- End Messages Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                <li class="dropdown-header">
                You have 3 new messages
                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                </li>
                <li>
                <hr class="dropdown-divider">
                </li>

                <li class="message-item">
                <a href="#">
                    <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                    <div>
                    <h4>Maria Hudson</h4>
                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                    <p>4 hrs. ago</p>
                    </div>
                </a>
                </li>
                <li>
                <hr class="dropdown-divider">
                </li>

                <li class="message-item">
                <a href="#">
                    <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                    <div>
                    <h4>Anna Nelson</h4>
                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                    <p>6 hrs. ago</p>
                    </div>
                </a>
                </li>
                <li>
                <hr class="dropdown-divider">
                </li>

                <li class="message-item">
                <a href="#">
                    <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                    <div>
                    <h4>David Muldon</h4>
                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                    <p>8 hrs. ago</p>
                    </div>
                </a>
                </li>
                <li>
                <hr class="dropdown-divider">
                </li>

                <li class="dropdown-footer">
                <a href="#">Show all messages</a>
                </li>

            </ul><!-- End Messages Dropdown Items -->

            </li><!-- End Messages Nav -->

            <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                <span class="d-none d-md-block dropdown-toggle ps-2">Staff</span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li class="dropdown-header">
                <h6>Staff</h6>
                <span>Web Designer</span>
                </li>
                <li>
                <hr class="dropdown-divider">
                </li>

                <li>
                <a class="dropdown-item d-flex align-items-center" href="">
                    <i class="bi bi-person"></i>
                    <span>My Profile</span>
                </a>
                </li>
                <li>
                <hr class="dropdown-divider">
                </li>

                <li>
                <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                    <i class="bi bi-gear"></i>
                    <span>Account Settings</span>
                </a>
                </li>
                <li>
                <hr class="dropdown-divider">
                </li>

                <li>
                <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                    <i class="bi bi-question-circle"></i>
                    <span>Need Help?</span>
                </a>
                </li>
                <li>
                <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> 
                    <i class="bx bx-power-off me-2"></i>
                    <span class="align-middle">Log Out</span>
                    </a>                       

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                    </form>
                </li>

            </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
        </nav><!-- End Icons Navigation -->

        </header><!-- End Header -->



        @endif

        <main class="py-4">
            @yield('content')
        </main>
    </div>


        
    <script src="{{asset('cust/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('cust/assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('cust/assets/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('cust/assets/js/mixitup.min.js')}}"></script>
<script src="{{asset('cust/assets/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('cust/assets/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('cust/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('cust/assets/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('cust/assets/js/main.js')}}"></script>

  <!-- Vendor JS Files -->
  <script src="  {{asset('backend/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="  {{asset('backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="  {{asset('backend/assets/vendor/chart.js/chart.min.js')}}"></script>
  <script src="  {{asset('backend/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="  {{asset('backend/assets/vendor/quill/quill.min.js')}}"></script>
  <script src="  {{asset('backend/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="  {{asset('backend/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="  {{asset('backend/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('backend/assets/js/main.js')}}"></script>
    @livewireScripts
</body>
</html>
