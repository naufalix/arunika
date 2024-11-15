<section class="pb-5" style="background-color: #8EACCD; border-radius: 0px 0px 40px 40px;">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-7 mx-auto">
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
  var diy = L.marker([-7.7956, 110.3695]).addTo(map).bindPopup("<b>Yogyakarta</b><br><br><button class='btn btn-sm btn-primary'>Detail</button>");
  var bali = L.marker([-8.3405, 115.0920]).addTo(map).bindPopup("<b>Bali</b><br><br><button class='btn btn-sm btn-primary'>Detail</button>");
  var bandung = L.marker([-6.9175, 107.6191]).addTo(map).bindPopup("<b>Bandung</b><br><br><button class='btn btn-sm btn-primary'>Detail</button>");
  var palembang = L.marker([-2.9909, 104.7563]).addTo(map).bindPopup("<b>Palembang</b><br><br><button class='btn btn-sm btn-primary'>Detail</button>");
  var makassar = L.marker([-5.1477, 119.4327]).addTo(map).bindPopup("<b>Makassar</b><br><br><button class='btn btn-sm btn-primary'>Detail</button>");

</script>