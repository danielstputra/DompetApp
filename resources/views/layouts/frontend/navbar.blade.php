<!-- begin header -->
<header>
<nav class="navbar navbar-expand-lg navbar-fixed-top">
  <div class="container">

    <!-- begin logo -->
    <a class="navbar-brand" href="#"><i class="bi bi-intersect"></i> Smart</a>
    <!-- end logo -->


    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"><i class="bi bi-list"></i></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarScroll">

      <!-- begin navbar-nav -->
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll justify-content-center">
        
        <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>

        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>

        <li class="nav-item"><a class="nav-link" href="#team">Our Team</a></li>

        <li class="nav-item"><a class="nav-link" href="#how-it-works">How It Works</a></li>

        <li class="nav-item"><a class="nav-link" href="#pricing">Pricing</a></li>

        <li class="nav-item"><a class="nav-link" href="#blog">Blog</a></li>

        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>

      </ul>

      @auth
      <div class="col-md-3 text-end">
        <a href="{{ route('admin.dashboard') }}"><button type="button" class="btn btn-primary"><i class="bi bi-person"></i> Panel Area</button></button></a>
      </div>
      @else
      <div class="col-md-3 text-end">
        <a href="{{ route('login') }}"><button type="button" class="btn btn-link"><i class="bi bi-person"></i> Masuk</button></a>
        <a href="{{ route('register') }}"><button type="button" class="btn btn-primary">Daftar</button></a>
      </div>
      @endauth
    </div>

  </div>

</nav>

</header>
<!-- end header -->