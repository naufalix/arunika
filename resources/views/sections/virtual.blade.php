<section id="virtual">
  
  <div class="container aos-init aos-animate" data-aos="fade-up">
    <div class="section-title aos-init aos-animate" data-aos="zoom-out">
      <h5 class="text-primary" lang-id="vr1">JELAJAHI</h5>
      <h2 class="h-bg" lang-id="vr2">Tur Virtual Wisata Indonesia</h2>
      <p class="col-md-4 mx-auto">
        <i lang-id="vr3">Mari kita jelajahi keindahannya bersama...</i>
      </p>
    </div>
  </div>

  <div class="container">
    
    <div class="swiper mySwiper2">
      <div class="swiper-wrapper">
       
        @foreach ($tourisms as $t)
        <style>
          .mySwiper2 .swiper-slide-{{ $t->id }} {
            background: linear-gradient(to top, #0f2027, #203a4300, #2c536400),
            url('/assets/img/tourism/{{ $t->image }}')
            no-repeat 50% 50% / cover;
          }
        </style>
        <div class="swiper-slide swiper-slide-{{ $t->id }}">
          <div data-mdb-modal-init data-mdb-target="#modal-vr" style="cursor: pointer" onclick="setvr('{{ $t->virtual }}','{{ $t->maps }}')">
            <span>{{ $t->category }}</span>
            <div>
              <h2>{{ $t->name }}</h2>
              <p>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                </svg>
                {{ $t->city->name }}
              </p>
            </div>
          </div>
        </div>
        @endforeach

      </div>
      <!-- Add Pagination -->
      <div class="swiper-pagination"></div>
    </div>

    <div class="section-title aos-init aos-animate" data-aos="zoom-out">
      <p class="fs-5 text-center pt-4 mt-4 mb-0">
        <i lang-id="vr4">...dan biarkan Indonesia meninggalkan kesan mendalam di perjalananmu.</i>
      </p>
    </div>
    
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="modal-vr" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body p-0">
        {{-- <button type="button" class="btn-close p-2" data-mdb-dismiss="modal" aria-label="Close"></button> --}}
        <a class="btn-icon px-2 py-1 vr-close" data-mdb-dismiss="modal"><i class="bi bi-x-lg"></i></a>
        <a class="gmaps px-2 py-1" href="" target="_blank">View on google maps</a>
        <div id="panorama"></div>
      </div>
    </div>
  </div>
</div>