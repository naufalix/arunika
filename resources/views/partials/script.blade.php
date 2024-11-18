<!-- Vendor JS Files -->
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/mdb/js/mdb.umd.min.js"></script>
<script src="/assets/vendor/leaflet/leaflet.js"></script>
<script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="/assets/vendor/pannellum/pannellum.js"></script>

<!-- Main JS File -->
<script src="/assets/js/script.js"></script>

<script>
  
  // Initialize leaflet
  var map = L.map('map', {
    center: [-2.2, 118],
    zoom: 4.0
  });
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);

  // Marker
  @foreach ($cities as $c)
  var {{ $c->name }} = L.marker([{{ $c->latitude }}, {{ $c->longitude }}]).addTo(map).bindPopup("<b>{{ $c->name }}</b><br><br><button class='btn btn-sm btn-primary'>Pergi</button>");
  @endforeach

  // Initialize Swiper
  var swiper = new Swiper(".mySwiper", {
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
  var swiper2 = new Swiper(".mySwiper2", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    coverflowEffect: {
      rotate: 0,
      stretch: 0,
      depth: 100,
      modifier: 2,
      slideShadows: true
    },
    keyboard: {
      enabled: true
    },
    mousewheel: {
      thresholdDelta: 70
    },
    spaceBetween: 60,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true
    }
  });
  var swiper3 = new Swiper(".mySwiper3", {
    slidesPerView: 1,
    spaceBetween: 30,
    speed: 1000,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    breakpoints: {
      640: {
        slidesPerView: 3,
        spaceBetween: 20,
      },
    },
    navigation: {
      nextEl: ".testimonial-next",
      prevEl: ".testimonial-prev",
    },
  });

  function setvr(virtual,maps){
    pannellum.viewer('panorama', {
      "type": "equirectangular",
      "panorama": "/assets/img/virtual/"+virtual
    });
    $('.gmaps').attr('href', maps);
  }
</script>