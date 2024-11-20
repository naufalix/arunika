<!-- Vendor JS Files -->
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/mdb/js/mdb.umd.min.js"></script>
<script src="/assets/vendor/leaflet/leaflet.js"></script>
<script src="/assets/vendor/leaflet/leaflet-providers.js"></script>
<script src="/assets/vendor/select2/select2.min.js"></script>
<script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="/assets/vendor/pannellum/pannellum.js"></script>

<!-- Main JS File -->
<script src="/assets/js/script.js"></script>

<script>
  
  $(document).ready(function () {
    checkThemeSession();
    setupCounters();
  });

  // Navbar change background color when scrolled
  $(window).scroll(function(){
    $('nav').toggleClass('scrolled', $(this).scrollTop() > 100);
  });

  // Function setup counters for statistic
  function setupCounters() {
    // Buat observer untuk mendeteksi elemen yang masuk viewport
    const observer = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          // Elemen terlihat, jalankan counter
          const element = $(entry.target);
          var countTo = parseInt(element.text(), 10);

          element.counter({
            duration: 4000,
            countFrom: 0,
            countTo: countTo,
            runOnce: true,
            placeholder: "?",
            easing: "easeOutCubic"
          });

          // Hentikan observasi untuk elemen ini agar tidak dijalankan ulang
          observer.unobserve(entry.target);
        }
      });
    });

    // Tambahkan semua elemen .counter ke dalam observer
    $('.counter').each(function () {
      observer.observe(this);
    });
  }

  // Function change theme
  function changetheme(theme) {
    $('.theme').css('display', 'none');
    $('#' + theme).css('display', 'block');
    if (theme === 'nyx') {
      $('body').addClass('dark');
      $('.navbar').addClass('navbar-dark');
      //L.tileLayer.provider('Stadia.AlidadeSmoothDark').addTo(map);
    } else {
      $('body').removeClass('dark');
      $('.navbar').removeClass('navbar-dark');
      //L.tileLayer.provider('CyclOSM').addTo(map);
    }
    localStorage.setItem('theme', theme);
  }

  // Function change theme from session if any
  function checkThemeSession() {
    var savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'nyx') {
      $('body').addClass('dark');
      $('.navbar').addClass('navbar-dark');
      $('#day').css('display', 'none');
      $('#nyx').css('display', 'block');
      //L.tileLayer.provider('Stadia.AlidadeSmoothDark').addTo(map);
    } else {
      $('body').removeClass('dark');
      $('.navbar').removeClass('navbar-dark');
      $('#nyx').css('display', 'none');
      $('#day').css('display', 'block');
    }
  }

  // Function change language
  function language(lang) {
    $('.lang').css('display', 'none');
    $('#lang_' + lang).css('display', 'block');

    // Ambil data JSON dari file /json/languages.json
    fetch('/json/languages.json')
      .then(response => response.json())
      .then(languages => {
        // Iterasi setiap item di dalam data JSON
        languages.forEach(l => {
          // Periksa bahasa yang dipilih
          if (lang === 'id') {
            // Ubah teks elemen berdasarkan lang_id
            $("[lang-id="+l.id+"]").text(l.lang_id);
          } else if (lang === 'en') {
            // Ubah teks elemen berdasarkan lang_en
            $("[lang-id="+l.id+"]").text(l.lang_en);
          }
        });
      })
      .catch(error => {
        console.error('Error loading languages:', error);
      });
  }

  // Initialize leaflet
  var map = L.map('map', {
    center: [-2.2, 118],
    zoom: 5
  });

  // L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  L.tileLayer('https://{s}.tile-cyclosm.openstreetmap.fr/cyclosm/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  }).addTo(map);
  // L.tileLayer.provider('Stadia.AlidadeSmoothDark').addTo(map);
  // L.tileLayer.provider('CyclOSM').addTo(map);
  // var CyclOSM = L.tileLayer('https://{s}.tile-cyclosm.openstreetmap.fr/cyclosm/{z}/{x}/{y}.png', {
  //   maxZoom: 20,
  //   attribution: '<a href="https://github.com/cyclosm/cyclosm-cartocss-style/releases" title="CyclOSM - Open Bicycle render">CyclOSM</a> | Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  // });
  
  // Set leaflet marker
  @foreach ($cities as $c)
  var {{ $c->name }} = L.marker([{{ $c->latitude }}, {{ $c->longitude }}]).addTo(map).bindPopup(
    "<b>{{ $c->name }}</b><br><br><button class='btn btn-sm btn-primary' onclick='pergi({{$loop->iteration}})'>Pergi</button>"
  );
  @endforeach

  // Function to handle button in map marker
  function pergi(id){
    var top = $("#city").position().top;
    $('html').scrollTop(top);
    swiper.slideTo(id-1);
  }

  // Initialize Select2
  $('#searchcity').select2();
  $('#searchcity').on('change', function() {
    let coordinate = $(this).val(); 
    let [lat, lng] = coordinate.split(',');
    map.panTo(new L.LatLng(lat, lng));
    map.setZoom(12);
    map.panTo(new L.LatLng(lat, lng));
  });
  $('#searchnavbar').select2();
  $('#searchnavbar').on('change', function() {
    let coordinate = $(this).val(); 
    let [lat, lng] = coordinate.split(',');
    map.panTo(new L.LatLng(lat, lng));
    map.setZoom(12);
    map.panTo(new L.LatLng(lat, lng));
    var top = $("#maps").position().top;
    $('html').scrollTop(top);
  });

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

  var swiper4 = new Swiper(".mySwiper4", {
    slidesPerView: 1,
    spaceBetween: 30,
    speed: 1000,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".quotes-next",
      prevEl: ".quotes-prev",
    },
  });

  // Function set virtual tour
  function setvr(virtual,maps){
    pannellum.viewer('panorama', {
      "type": "equirectangular",
      "panorama": "/assets/img/virtual/"+virtual
    });
    $('.gmaps').attr('href', maps);
  }
</script>