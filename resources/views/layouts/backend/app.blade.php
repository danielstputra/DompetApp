<!-----------------------------------------------------------------------------------

    Template Name: CyberFrost Modern Theme
    Template Version : 1.0.1
    -----------------------------------------------------
    Author: Daniels Trysyahputra
    Author URI: https://motonet.id/

----------------------------------------------------------------------------------->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CyberFrost admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, CyberFrost Modern Theme, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('templates/backend/CyberFrostModernTheme') }}/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('templates/backend/CyberFrostModernTheme') }}/images/favicon.png" type="image/x-icon">
    <title>{{ config('app.name') }} | {{ $title ?? '' }}</title>
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
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/backend/CyberFrostModernTheme') }}/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/backend/CyberFrostModernTheme') }}/css/vendors/select2.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/backend/CyberFrostModernTheme') }}/css/vendors/date-picker.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/backend/CyberFrostModernTheme') }}/css/vendors/datatables.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/backend/CyberFrostModernTheme') }}/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/backend/CyberFrostModernTheme') }}/css/style.css">
    <link id="color" rel="stylesheet" href="{{ asset('templates/backend/CyberFrostModernTheme') }}/css/color-2.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/backend/CyberFrostModernTheme') }}/css/responsive.css">
    @stack('css')
  </head>
  <body>
    <div class="loader-wrapper">
      <div class="loader-index"><span></span></div>
      <svg>
        <defs></defs>
        <filter id="goo">
          <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
          <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
        </filter>
      </svg>
    </div>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Navbar Start-->
      @include('layouts.backend.navbar')
      <!-- Page Navbar Ends-->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        @include('layouts.backend.sidebar')
        <!-- Page Sidebar Ends-->
        <div class="page-body">
            @yield('content')
        </div>
        <!-- footer start-->
        @include('layouts.backend.footer')
        <!-- footer end-->