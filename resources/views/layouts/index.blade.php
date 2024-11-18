<!DOCTYPE html>
<html lang="en">

<head>
  @include('partials.head')
</head>

<body class="index-page">

  @include('partials.header')

  <main class="main">
    @yield('content')
  </main>

  @include('partials.footer')

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="d-none scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  @include('partials.script')
  @yield('script')

</body>

</html>