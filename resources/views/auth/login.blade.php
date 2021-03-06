<!-----------------------------------------------------------------------------------

    Template Name: CyberFrost Modern Theme
    Template Version : 1.0.1
    -----------------------------------------------------
    Author: Daniels Trysyahputra
    Author URI: https://motonet.id/

----------------------------------------------------------------------------------->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CyberFrost admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, CyberFrost Modern Theme, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('templates/backend/CyberFrostModernTheme') }}/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('templates/backend/CyberFrostModernTheme') }}/images/favicon.png" type="image/x-icon">
    <title>{{ config('app.name') }} | Masuk Panel</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/backend/CyberFrostModernTheme') }}/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/backend/CyberFrostModernTheme') }}/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/backend/CyberFrostModernTheme') }}/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/backend/CyberFrostModernTheme') }}/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/backend/CyberFrostModernTheme') }}/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/backend/CyberFrostModernTheme') }}/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/backend/CyberFrostModernTheme') }}/css/style.css">
    <link id="color" rel="stylesheet" href="{{ asset('templates/backend/CyberFrostModernTheme') }}/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/backend/CyberFrostModernTheme') }}/css/responsive.css">
  </head>
  <body>
    <!-- login page start-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-5"><img class="bg-img-cover bg-center" src="{{ asset('templates/backend/CyberFrostModernTheme') }}/images/login/3.jpg" alt="looginpage"></div>
        <div class="col-xl-7 p-0">
          <div class="login-card">
            <div>
              <div><a class="logo" href="{{ route('login') }}"><img class="img-fluid for-light" src="{{ asset('templates/backend/CyberFrostModernTheme') }}/images/logo/login.png" alt="looginpage"><img class="img-fluid for-dark" src="{{ asset('templates/backend/CyberFrostModernTheme') }}/images/logo/logo_dark.png" alt="looginpage"></a></div>
              <div class="login-main">
                @include('flash-message')
                <form class="theme-form" action="{{ route('login.post') }}" method="POST">
                  @csrf
                  <h4>{{ __('Masuk ke akun') }}</h4>
                  <p>{{ __('Masukkan email & kata sandi Anda untuk masuk') }}</p>
                  <div class="form-group">
                    <label for="email" class="col-form-label">{{ __('Alamat Email') }}</label>
                    <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" autocomplete="email" placeholder="Masukkan Alamat Email">
                  </div>
                  <div class="form-group">
                    <label for="password" class="col-form-label">{{ __('Kata Sandi') }}</label>
                    <div class="form-input position-relative">
                        <input class="form-control" type="password" name="password" id="password" value="{{ old('password') }}" autocomplete="new-password" placeholder="Masukkan Kata Sandi">
                    </div>
                  </div>
                  <div class="form-group mb-0">
                    <div class="checkbox p-0">
                      <input type="checkbox" id="rememberMe" name="rememberMe">
                      <label class="text-muted" for="rememberMe">{{ __('Ingatkan kata sandi?') }}</label>
                    </div>
                    <a class="link" href="forget-password.html">{{ __('Lupa kata sandi?') }}</a>
                    <div class="text-end mt-3">
                      <button class="btn btn-primary btn-block w-100" type="submit">{{ __('Masuk') }}</button>
                    </div>
                  </div>
                  <script>
                    (function() {
                    'use strict';
                    window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                    }, false);
                    });
                    }, false);
                    })();
                    
                  </script>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- latest jquery-->
      <script src="{{ asset('templates/backend/CyberFrostModernTheme') }}/js/jquery-3.5.1.min.js"></script>
      <!-- Bootstrap js-->
      <script src="{{ asset('templates/backend/CyberFrostModernTheme') }}/js/bootstrap/bootstrap.bundle.min.js"></script>
      <!-- feather icon js-->
      <script src="{{ asset('templates/backend/CyberFrostModernTheme') }}/js/icons/feather-icon/feather.min.js"></script>
      <script src="{{ asset('templates/backend/CyberFrostModernTheme') }}/js/icons/feather-icon/feather-icon.js"></script>
      <!-- scrollbar js-->
      <!-- Sidebar jquery-->
      <script src="{{ asset('templates/backend/CyberFrostModernTheme') }}/js/config.js"></script>
      <!-- Plugins JS start-->
      <!-- Plugins JS Ends-->
      <!-- Theme js-->
      <script src="{{ asset('templates/backend/CyberFrostModernTheme') }}/js/script.js"></script>
      <!-- login js-->
      <!-- Plugin used-->
    </div>
  </body>
</html>
