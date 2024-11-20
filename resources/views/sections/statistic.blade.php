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
                <img class="rounded-circle" src="/assets/img/s{{$loop->iteration}}.webp" alt="" style="width: 50px;">
              </div>
              <div class="mx-3">
                <p class="mb-0 h4 counter">{{ $s['count'] }}</p>
                <p class="mb-0" lang-id="st{{$loop->iteration}}">{{ $s['name'] }}</p>
              </div>
            </div>
          </div>
        </div>
      @endforeach

    </div>
  </div>
</section>