<section id="statistic" style="background: linear-gradient(to bottom right, #E2EAF7, #FFFFFF )">
  <div class="container">
    <div class="row">
      @php
        $stats = [
          ['count' => 1239, 'name' => 'Warisan budaya'],
          ['count' => 1300, 'name' => 'Suku bangsa'],
          ['count' => 718, 'name' => 'Bahasa daerah'],
          ['count' => 5300, 'name' => 'Kuliner khas']
        ];
      @endphp

      @foreach ($stats as $s)
        <div class="col-md-3 mb-3">
          <div class="card">
            <div class="p-3 d-flex">
              <div class="my-auto">
                <img class="rounded-circle" src="/assets/img/elaina.webp" alt="">
              </div>
              <div class="mx-3">
                <p class="mb-0 h4 counter">{{ $s['count'] }}</p>
                <p class="mb-0">{{ $s['name'] }}</p>
              </div>
            </div>
          </div>
        </div>
      @endforeach

    </div>
  </div>
</section>

<script>
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


</script>