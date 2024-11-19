<style>
  #statistic img{
    width: 50px;
    aspect-ratio: 1/1;
    object-fit: cover;
  }
</style>

<section id="statistic" style="background: linear-gradient(to bottom right, #E2EAF7, #FFFFFF )">
  <div class="container">
    <div class="row">
      @php
        $stats = [
          ['count' => 1941, 'name' => 'Warisan budaya'],
          ['count' => 1340, 'name' => 'Suku bangsa'],
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
  $('.counter').each(function () {
    var countTo = parseInt($(this).text(), 10);

    $(this).counter({
      duration: 4000,
      countFrom: 0,
      countTo: countTo,
      runOnce: true,
      placeholder: "?",
      easing: "easeOutCubic"
    });
  });
</script>