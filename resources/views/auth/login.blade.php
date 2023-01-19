<!DOCTYPE html>
 
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
 
    <title>Abagus E-Print</title>
 
    <meta name="description" content="" />
 
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{('staff/assets/img/favicon/favicon.ico')}}" />
 
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
 
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('staff/assets/vendor/fonts/boxicons.css')}}"/> 
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('staff/assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('staff/assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('staff/assets/css/demo.css')}}" />
 
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('staff/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
 
    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('staff/assets/vendor/css/pages/page-auth.css')}}" />
    <!-- Helpers -->
    <script src="{{asset('staff/assets/vendor/js/helpers.js')}}"></script>
 
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('staff/assets/js/config.js')}}"></script>
  </head>
 
  <body>
    <!-- Content -->
 
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                    <span class="app-brand-logo demo">
                        <svg
                        width="25"
                        viewBox="0 0 25 42"
                        version="1.1"
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink">
                        </svg>
                    </span>
                  <img src=" {{asset('staff/assets/img/abLogo.png')}}" style="margin-top:10px; width:18%; height:18%;" >
                  <span class="app-brand-text  text-body fw-bolder" style=" font-size: 30px;">Abagus E-Print</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2" style="margin-top:-20px;">Login</h4><br>
 
 
 
 
              <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
              @csrf
 
               
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
 
 
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
 
                
 
                <div class="mb-3">
                  <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                      Remember Me
                    </label>
                  </div>
                </div>

                <div class="row mb-0">
                                <button type="submit" class="btn btn-primary d-grid w-100">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                        </div>
            
            </form>
 
             
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>
 
    <!-- / Content -->
 
   
 
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
 
    <script src="{{asset('staff/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('staff/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('staff/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('staff/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
 
    <script src="{{asset('staff/assets/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->
 
    <!-- Vendors JS -->
 
    <!-- Main JS -->
    <script src="{{asset('staff/assets/js/main.js')}}"></script>
 
    <!-- Page JS -->
 
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
