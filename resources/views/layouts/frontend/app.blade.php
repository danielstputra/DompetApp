<!-----------------------------------------------------------------------------------

    Template Name: CyberFrost Modern Theme
    Template Version : 1.0.1
    -----------------------------------------------------
    Author: Daniels Trysyahputra
    Author URI: https://motonet.id/

----------------------------------------------------------------------------------->

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Epic-Themes">
    <meta name="keywords" content="landing page, click-through, lead gen, marketing campaign, mobile app launch, one page template, product launch, products, responsive, saas, startup, html template, html5, css3, bootstrap, creative, designer, freelancer">
    <meta name="description" content="Landing Page Template for Creative Agencies, Apps, Portfolio Websites and Small Businesses">

    <title>{{ $config->app_name }} | {{ $title ?? '' }}</title>
    
    <!-- Loading Bootstrap -->
    <link href="{{ asset('templates/frontend/SmartV2') }}/css/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Template CSS -->
    <link href="{{ asset('templates/frontend/SmartV2') }}/css/style.css" rel="stylesheet">
    <link href="{{ asset('templates/frontend/SmartV2') }}/css/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('templates/frontend/SmartV2') }}/css/animate.css" rel="stylesheet">
    <link href="{{ asset('templates/frontend/SmartV2') }}/css/style-magnific-popup.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&amp;family=Open+Sans:ital@0;1&amp;display=swap" rel="stylesheet">

    <!-- Font Favicon -->
    <link rel="shortcut icon" href="{{ asset('templates/frontend/SmartV2') }}/images/favicon.ico">

</head>

<body>
@include('layouts.frontend.navbar')
<main>
@yield('content')
@include('layouts.frontend.footer')