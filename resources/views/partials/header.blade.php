  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-nav fixed-top">
    <div class="container">
      {{-- <a class="navbar-brand" href="#">Arunika Nusantara</a> --}}
      <a class="navbar-brand" href="#">
        <img src="/assets/img/logo.png" alt="Arunika Nusantara Logo" style="height: 40px;">
      </a>
    
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <!-- Dropdown -->
          <li><a class="nav-link" href="#hero">Beranda</a></li>
          <li><a class="nav-link" href="#maps">Peta interaktif</a></li>
          <li><a class="nav-link" href="#city">Ensiklopedia Budaya</a></li>
          <li><a class="nav-link" href="#virtual">Tur Virtual</a></li>
          <li><a class="nav-link" href="#testimonial">Ulasan</a></li>
          <li><a class="nav-link" href="#"><i class="fa fa-search"></i></a></li>
          <li id="day" class="mode">
            <button class="nav-link" onclick="changemode('nyx')"><i class="bi bi-sun"></i></button>
          </li>
          <li id="nyx" class="mode" style="display: none">
            <button class="nav-link" onclick="changemode('day')"><i class="bi bi-moon"></i></button>
          </li>
          <li class="nav-item dropdown ms-auto d-none">
            <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" role="button"
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

  <script>
    $(window).scroll(function(){
      $('nav').toggleClass('scrolled', $(this).scrollTop() > 100);
    });

    function changemode(mode) {
      $('.mode').css('display', 'none');
      $('#' + mode).css('display', 'block');
      if (mode === 'nyx') {
        $('body').addClass('dark');
        $('.navbar').addClass('navbar-dark');
      } else {
        $('body').removeClass('dark');
        $('.navbar').removeClass('navbar-dark');
      }
    }
  </script>