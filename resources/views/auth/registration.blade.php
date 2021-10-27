

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('templates/backend/CubeTheme') }}/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('templates/backend/CubeTheme') }}/images/favicon.png" type="image/x-icon">
    <title>{{ $config->app_name }} | Register Akun</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/backend/CubeTheme') }}/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/backend/CubeTheme') }}/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/backend/CubeTheme') }}/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/backend/CubeTheme') }}/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/backend/CubeTheme') }}/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/backend/CubeTheme') }}/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/backend/CubeTheme') }}/css/style.css">
    <link id="color" rel="stylesheet" href="{{ asset('templates/backend/CubeTheme') }}/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/backend/CubeTheme') }}/css/responsive.css">
  </head>
  <body>
    <!-- login page start-->
    <div class="container-fluid">
      <div class="row m-0">
        <div class="col-xl-5"><img class="bg-img-cover bg-center" src="{{ asset('templates/backend/CubeTheme') }}/images/login/3.jpg" alt="looginpage"></div>
        <div class="col-xl-7 p-0"> 
          <div class="login-card">
            <div>
              <div><a class="logo" href="index-2.html"><img class="img-fluid for-light" src="{{ asset('templates/backend/CubeTheme') }}/images/logo/login.png" alt="looginpage"><img class="img-fluid for-dark" src="{{ asset('templates/backend/CubeTheme') }}/images/logo/logo_dark.png" alt="looginpage"></a></div>
              <div class="login-main">
                @include('flash-message')
                <form class="theme-form" action="{{ route('register.post') }}" method="POST">
                  @csrf
                  <h4>{{ __('Buat akun baru Anda') }}</h4>
                  <p>{{ __('Masukan detail personal Anda untuk membuat akun baru') }}</p>
                  <div class="form-group">
                    <label for="username" class="col-form-label">{{ __('Nama Pengguna') }}</label>
                    <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" id="username" value="{{ old('username') }}" autocomplete="username" autofocus placeholder="Masukkan Nama Pengguna" required />
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="fullname" class="col-form-label">{{ __('Nama Lengkap') }}</label>
                    <input class="form-control @error('fullname') is-invalid @enderror" type="text" name="fullname" id="fullname" value="{{ old('fullname') }}" autocomplete="fullname" placeholder="Masukkan Nama Lengkap" required />
                    @error('fullname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-form-label">{{ __('Alamat Email') }}</label>
                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" value="{{ old('email') }}" autocomplete="email" placeholder="Masukkan Alamat Email" required />
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="phone_number" class="col-form-label">{{ __('Nomor HP') }}</label>
                    <input class="form-control @error('phone_number') is-invalid @enderror" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" autocomplete="phone_number" placeholder="Masukkan Nomor Handphone" required />
                    @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="password" class="col-form-label">{{ __('Kata Sandi') }}</label>
                    <div class="form-input position-relative">
                        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" value="{{ old('password') }}" autocomplete="password" placeholder="Masukkan Kata Sandi" required />
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password_confirmation" class="col-form-label">{{ __('Konfirmasi Kata Sandi') }}</label>
                    <div class="form-input position-relative">
                      <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" autocomplete="password_confirmation" placeholder="Masukkan Kata Sandi Konfirmasi" required />
                      @error('password_confirmation')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group mb-0">
                    <div class="checkbox p-0">
                      <input id="checkbox1" type="checkbox">
                      <label class="text-muted" for="checkbox1">{{ __('Setuju dengan') }}<a class="ms-2" href="#">{{ __('Kebijakan Pribadi') }}</a></label>
                    </div>
                    <button class="btn btn-primary btn-block w-100" type="submit">{{ __('Daftar') }}</button>
                  </div>
                  <p class="mt-4 mb-0 text-center">{{ __('Sudah memiliki akun?') }}<a class="ms-2" href="{{ route('login') }}">{{ __('Masuk') }}</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- latest jquery-->
      <script src="{{ asset('templates/backend/CubeTheme') }}/js/jquery-3.5.1.min.js"></script>
      <!-- Bootstrap js-->
      <script src="{{ asset('templates/backend/CubeTheme') }}/js/bootstrap/bootstrap.bundle.min.js"></script>
      <!-- feather icon js-->
      <script src="{{ asset('templates/backend/CubeTheme') }}/js/icons/feather-icon/feather.min.js"></script>
      <script src="{{ asset('templates/backend/CubeTheme') }}/js/icons/feather-icon/feather-icon.js"></script>
      <!-- scrollbar js-->
      <!-- Sidebar jquery-->
      <script src="{{ asset('templates/backend/CubeTheme') }}/js/config.js"></script>
      <!-- Plugins JS start-->
      <!-- Plugins JS Ends-->
      <!-- Theme js-->
      <script src="{{ asset('templates/backend/CubeTheme') }}/js/script.js"></script>
      <!-- login js-->
      <!-- Plugin used-->
    </div>
  </body>
</html>
