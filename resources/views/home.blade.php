@extends('layouts.index')

@section('content')
  {{-- @include('sections.hero') --}}
  <section style="background: linear-gradient(to bottom, #021526, #8EACCD);">
    <div class="container py-5">
      <div class="row py-5">
        <div class="col-12 col-md-6 my-auto">
          <h1 class="text-white">Jelajahi Budaya di Indonesia</h1>
          <p class="text-white">Arunika Nusantara adalah platform digital interaktif yang mengajak Anda menjelajahi Indonesia secara mendalam. Dengan fitur peta interaktif, ensiklopedia budaya, dan tur virtual berbasis VR/AR, Anda bisa menyusuri keindahan alam, memahami kekayaan etnis, dan merasakan adat istiadat Nusantara seolah berada di lokasi. Platform ini juga menyajikan agenda budaya terkini dan review pengunjung untuk pengalaman yang kaya dan autentik, menjadikan Arunika Nusantara pintu gerbang menuju keajaiban Indonesia</p>
        </div>
        <div class="col-12 col-md-6 d-flex">
          <div class="ms-auto">
            <img src="/assets/img/hero-img.webp" alt="" style="width: 100%">
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="pb-5" style="background-color: #8EACCD;">
    <div class="container position-relative">
      <div class="row">
        <div class="col-12 col-md-7 mx-auto position-relative">
          <div class="p-4 p-md-5 rounded-9" style="background-color: #295F98;">
            <input type="text" class="form-control rounded-6" style="height: 48px">
            <br>
            <div id="map" class="rounded-6" style="width: 100%; height: 400px;"></div>
          </div>
        </div>
        <div class="col-12 col-md-8 d-flex justify-content-center align-items-center mx-auto">
            <img src="/assets/img/buku.png" alt="" style="width: 100%">
        </div>
        <img src="/assets/img/awan.png" alt="Awan" class="position-absolute ms-0" style="left: -45%; top: 20%; width:80%";>
        <img src="/assets/img/awan2.png" alt="Awan" class="position-absolute ms-0" style="right: -45%; top: 20%; width:80%";>
      </div>
    </div>
  </section>

  <script>
    // initialize the map on the "map" div with a given center and zoom
    var map = L.map('map', {
        center: [-2.2, 118],
        zoom: 4.0
    });
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Marker
    var diy = L.marker([-7.7956, 110.3695]).addTo(map).bindPopup("<b>Yogyakarta</b><br><br><button class='btn btn-sm btn-primary'>Pergi</button>");
    var bali = L.marker([-8.3405, 115.0920]).addTo(map).bindPopup("<b>Bali</b><br><br><button class='btn btn-sm btn-primary'>Pergi</button>");
    var bandung = L.marker([-6.9175, 107.6191]).addTo(map).bindPopup("<b>Bandung</b><br><br><button class='btn btn-sm btn-primary'>Pergi</button>");
    var palembang = L.marker([-2.9909, 104.7563]).addTo(map).bindPopup("<b>Palembang</b><br><br><button class='btn btn-sm btn-primary'>Pergi</button>");
    var makassar = L.marker([-5.1477, 119.4327]).addTo(map).bindPopup("<b>Makassar</b><br><br><button class='btn btn-sm btn-primary'>Pergi</button>");
  
  </script>
  <!-- Jumbotron -->
  <div class="p-5 text-center bg-body-tertiary mb-5">
    <h1 class="mb-3">I am learning MDB</h1>
    <h4 class="mb-4">...and it's awesome!</h4>
    <a class="btn btn-primary btn-lg" href="https://mdbootstrap.com/learn/mdb-foundations/basics/introduction/"
      role="button">Learn with me</a>
  </div>
  <!-- Jumbotron -->

  <div class="container">
    <div class="row">

      <!-- First column -->
      <div class="col-md">

        <!-- Card -->
        <div class="card mb-5">
          <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
            <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/111.webp" class="img-fluid" />
            <a href="#!">
              <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
            </a>
          </div>
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
            <a href="#!" class="btn btn-primary">Button</a>
          </div>
        </div>
        <!-- Card -->

      </div>
      <!-- First column -->

      <!-- Second column -->
      <div class="col-md">

        <!-- Card -->
        <div class="card mb-5">
          <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
            <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/112.webp" class="img-fluid" />
            <a href="#!">
              <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
            </a>
          </div>
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
            <a href="#!" class="btn btn-primary">Button</a>
          </div>
        </div>
        <!-- Card -->

      </div>
      <!-- Second column -->

      <!-- Third column -->
      <div class="col-md">

        <!-- Card -->
        <div class="card mb-5">
          <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
            <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/113.webp" class="img-fluid" />
            <a href="#!">
              <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
            </a>
          </div>
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
            <a href="#!" class="btn btn-primary">Button</a>
          </div>
        </div>
        <!-- Card -->

      </div>
      <!-- Third column -->

    </div>
  </div>
@endsection

@section('script')

@endsection