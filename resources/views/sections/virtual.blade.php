<style>
  .swiper.mySwiper2 {
    width: 100%;
    padding-top: 50px;
    padding-bottom: 50px;
  }

  .mySwiper2 .swiper-slide {
    width: 300px;
    height: 400px;
    box-shadow: 0 15px 50px rgba(0, 0, 0, 0.2);
    filter: blur(1px);
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    justify-content: end;
    align-items: self-start;
  }

  .mySwiper2 .swiper-slide-active {
    filter: blur(0px);
  }

  .mySwiper2 .swiper-pagination-bullet,
  .mySwiper2 .swiper-pagination-bullet-active {
    background: #fff;
  }

  .mySwiper2 .swiper-slide span {
    text-transform: uppercase;
    color: #fff;
    background: #1b7402;
    padding: 7px 18px 7px 25px;
    display: inline-block;
    border-radius: 0 20px 20px 0px;
    letter-spacing: 2px;
    font-size: 0.8rem;
    font-family: "Open Sans", sans-serif;
  }

  .mySwiper2 .swiper-slide span {
    background: #3B71CA;
  }

  .mySwiper2 .swiper-slide h2 {
    color: #fff;
    font-family: "Roboto", sans-serif;
    font-weight: 400;
    font-size: 1.3rem;
    line-height: 1.4;
    margin-bottom: 15px;
    padding: 25px 45px 0 25px;
  }

  .mySwiper2 .swiper-slide p {
    color: #fff;
    font-family: "Roboto", sans-serif;
    font-weight: 300;
    display: flex;
    align-items: center;
    padding: 0 25px 35px 25px;
  }

  .mySwiper2 .swiper-slide svg {
    color: #fff;
    width: 22px;
    height: 22px;
    margin-right: 7px;
  }

  .mySwiper2 .swiper-3d .swiper-slide-shadow-left,
  .mySwiper2 .swiper-3d .swiper-slide-shadow-right {
    background-image: none;
  }
</style>

<section class="py-5" style="background-color: #021526">
  <div class="container">
    <h3 class="text-center text-white">Tur Virtual Wisata Indonesia</h3>
    
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
    
  </div>
</section>

<style>
 
    #panorama {
      height: 400px;
    }
    #modal-vr .btn-close{
      position: absolute;
      right: 0;
      z-index: 2;
    }
    #modal-vr .gmaps{
      position: absolute;
      right: 0;
      bottom: 0;
      z-index: 2;
      font-size: 10px;
      color: white;
      background: #00000050;
    }
    #modal-vr .vr-close{
      position: absolute;
      right: 0;
      z-index: 2;
      color: white;
      background: #00000050;
    }
</style>

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