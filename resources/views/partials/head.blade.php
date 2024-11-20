<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Arunika Nusantara</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="/assets/img/logo-new.png" rel="icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="/assets/vendor/aos/aos.css">
  <link rel="stylesheet" href="/assets/vendor/bootstrap-icons/bootstrap-icons.css">
  <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.min.css"/>
  <link rel="stylesheet" href="/assets/vendor/mdb/css/mdb.min.css" />
  <link rel="stylesheet" href="/assets/vendor/leaflet/leaflet.css" />
  <link rel="stylesheet" href="/assets/vendor/pannellum/pannellum.css" />
  <link rel="stylesheet" href="/assets/vendor/select2/select2.min.css" />
  <link rel="stylesheet" href="/assets/vendor/swiper/swiper-bundle.min.css" />

  <!-- jQuery -->
  <script src="/assets/js/jquery.min.js"></script>
  <script src="/assets/js/jquery.easing.js"></script>
  <script src="/assets/js/counter.min.js"></script>

  @php
    function minify_css($css) {
      // Hapus komentar, spasi, tab, dan baris baru
      $css = preg_replace('!/\*.*?\*/!s', '', $css); // Hapus komentar
      $css = preg_replace('/\s+/', ' ', $css);       // Ganti spasi dan baris baru dengan satu spasi
      $css = str_replace([' {', '{ '], '{', $css);   // Hapus spasi di sekitar tanda kurung kurawal
      $css = str_replace([' }', '} '], '}', $css);   // Hapus spasi di sekitar tanda kurawal
      $css = str_replace([' ;', '; '], ';', $css);   // Hapus spasi di sekitar titik koma
      return trim($css);
    }
  @endphp

  <style>
    {!! minify_css(file_get_contents(public_path('assets/css/style.css'))) !!}{!! minify_css(file_get_contents(public_path('assets/css/dark.css'))) !!}
  </style>