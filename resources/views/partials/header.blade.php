  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-nav fixed-top">
    <div class="container">
      {{-- <a class="navbar-brand" href="#">Arunika Nusantara</a> --}}
      <a class="navbar-brand" href="#">
        <img src="/assets/img/logo.png" alt="Arunika Nusantara Logo" style="height: 40px;">
      </a>
    
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="text-white fa fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <!-- Dropdown -->
          <li><a class="nav-link" href="#hero">Beranda</a></li>
          <li><a class="nav-link" href="#maps">Peta interaktif</a></li>
          <li><a class="nav-link" href="#city">Ensiklopedia Budaya</a></li>
          <li><a class="nav-link" href="#virtual">Tur Virtual</a></li>
          <li><a class="nav-link" href="#testimonial">Ulasan</a></li>
          <li class="nav-item dropdown ms-auto d-none">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              My Projects
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="#ms1">Project 1</a></li>
              <li><a class="dropdown-item" href="#ms2">Project 2</a></li>
              <li><a class="dropdown-item" href="#ms3">Project 3</a></li>
              <li><a class="dropdown-item" href="#ms4">Project 4</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
  <style>
    .bg-nav {
      background: transparent !important;
      transition: 0.2s ease-in;
    }
    .bg-nav.scrolled {
      background: #021526 !important;
      box-shadow: var(--mdb-navbar-box-shadow);
    }
    .nav-link{
      font-size: 15px;
      color: white;
      margin: 0px 4px;
    }
    .navbar-toggler {
      display: none;
    }
    @media (max-width: 992px) {
      .bg-nav.scrolled .navbar-toggler {
        display: block;
      }
    }
  </style>

  <script>
    $(window).scroll(function(){
      $('nav').toggleClass('scrolled', $(this).scrollTop() > 100);
      });
  </script>