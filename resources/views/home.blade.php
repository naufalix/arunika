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
            <img src="/assets/img/hero-img.png" alt="" style="height: 500px">
          </div>
        </div>
      </div>
    </div>
  </section>
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