<style>
  #city{
    /* background-color: #98DED9; */
  }
  #city .img-thumb{
    position: relative;
    transition: transform 0.5s ease-in-out;
  }
  #city .img-thumb:hover {
    transform: scale(1.1); /* Membesarkan gambar saat di-hover */
  }
  #city .img-thumb:hover .custom-bg.bg-1{
    width: 25% !important;
  }
  #city .img-thumb:hover .bg-2{
    width: 20% !important;
    left: 12% !important;
  }
  #city .img-thumb img{
    width: 100%; object-fit: cover;
  }
  #city .custom-bg{
    position: absolute;
    height: -webkit-fill-available;
    transition: all ease-in-out 0.4s;
  }
  .tag {
    cursor: pointer;
    align-content: center;
    width: 100%;
    height: 100%;
    float: left;
    position: absolute;
    left: 0px;
    top: 0px;
    z-index: 1000;
    /* background: linear-gradient(to bottom, transparent, #3B71CA); */
    padding: 12px;
    color: #FFFFFF;
    font-weight: bold;
  }
  @media (max-width: 600px) {
    .tag {
      font-size: 12px !important;
      line-height: normal;
      padding: 8px !important;
    }
    #agenda .d-flex{
      zoom: 80%;
    }
  }
  #agenda{
    background-color: #112942;
  }
  #agenda img{
    max-width: 50px;
    object-fit: cover;
    aspect-ratio: 1/1;
  }
</style>

<section id="city" class="py-5">
  
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">

      @foreach ($cities as $c)
      <div class="swiper-slide">
        <div class="container">
          <div class="row">
            <div class="col-12 col-md-6 d-flex">
              <div class="my-auto text-center text-md-start">
                <h2 class="h1">{{ $c->name }}</h2>
                <p class="col-12 col-md-10 ">{{ $c->description }}</p>
                <div class="d-flex mb-4">
                  <div class="mx-auto mx-md-0">
                    <button type="button" class="btn btn-primary" data-mdb-modal-init data-mdb-target="#info{{ $c->id }}">Infografis</button>
                    <a href="#agenda" class="btn btn-primary ms-2" data-mdb-collapse-init role="button">Agenda Budaya</a>
                  </div>
                </div>
                <div class="collapse mx-auto rounded-6 text-white" id="agenda">
                  <div class="p-3 pb-0 mb-2">
                    <h4 class="text-center my-2">Agenda Budaya</h4>
                    <br>
                    <div class="row">
                      @foreach ($c->cultural as $cu)
                      <div class="col-12 mb-4">
                        <div class="card p-2 p-md-3">
                          <div class="d-flex">
                            <div class="me-3 my-auto">
                              <img src="/assets/img/cultural/{{ $cu->image }}" class="my-auto rounded-circle" alt="">
                            </div>
                            <div class="text-start"> 
                              <p class="mb-0 fw-bold">{{ $cu->title }}</p>
                              <p class="mb-0" style="font-size: 12px">{{ $cu->date }}</p>
                              <p class="mb-0" style="font-size: 12px"><i class="fa fa-bank"></i> {{ $cu->place }}</p>
                            </div>
                            <div class="ms-auto my-auto">
                              <span class="badge rounded-pill badge-primary" style="float: inline-end">{{ $cu->price }}</span>
                              <br>
                              <span class="badge rounded-pill badge-info">Semua umur</span>
                            </div>

                          </div>
                        </div>
                      </div>
                      {{-- <div class="swiper-slide">
                        <div class="row p-2">
                          <div class="col-12 col-md-6 detail my-auto">
                            <p class="mb-0">{{ $cu->name }}</p>
                            <p class="mb-0">{{ $cu->date }}</p>
                            <p class="mb-0">{{ $cu->place }}</p>
                            <p class="mb-0">{{ $cu->price }}</p>
                            <p class="mb-0">Semua Umur</p>
                          </div>
                          <div class="col-12 col-md-6 d-flex">
                            <img src="/assets/img/cultural/{{ $cu->image }}" class="m-auto rounded-3" alt="">
                          </div>
                        </div>
                      </div>      --}}
                      @endforeach
                    </div>
                  </div>
                  

                </div>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="row mt-2">
                @foreach ($c->encyclopedia as $e)
                <div class="col-6 mb-4">
                  <div class="img-thumb" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#encyclopedia{{ $e->id }}">
                    <div class="tag rounded-4">{{ $e->title }}</div>
                    {{-- <div class="custom-bg rounded-4" style="width:100%; background-image: url(/assets/img/encyclopedia/{{ $e->image }}); background-size: contain; background-position: right;"></div> --}}
                    <div class="custom-bg bg-1 rounded-4" style="width: 55%; background-color: #3B71CA;"></div>
                    <div class="custom-bg bg-2" style="width: 35%; left: 40%; transform: skewX(-35deg); background-color: #3B71CA"></div>
                    
                    <img class="rounded-4" src="/assets/img/encyclopedia/{{ $e->image }}" alt="" style="aspect-ratio: 16/4">
                  </div>
                </div>
                <br>
                @endforeach
              </div>
            </div>
            
            {{-- <div class="col-12 text-center mt-5">
              <a href="#collapseExample" class=" mx-auto btn btn-primary mb-3" data-mdb-collapse-init data-mdb-ripple-init role="button" aria-expanded="false" aria-controls="collapseExample">
                LIHAT TEMPAT WISATA
              </a>     
            </div> --}}
      
          </div>
        </div>

      </div>
      @endforeach

    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>

  @foreach ($cities as $c)
    <!-- Modal -->
    <div class="modal fade" id="info{{ $c->id }}" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header border-0 pb-0">
            <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body pt-0">
            <div class="row">
              <div class="col-12 col-md-4 d-flex">
                <img src="/assets/img/city/{{ $c->image }}" class="m-auto" alt="" style="max-width: 100px">
              </div>
              <div class="col-12 col-md-8 text-center text-md-start">
                <h3 class="my-4">{{ $c->name }}</h3>
                <table class="col-12 text-start">
                  <tr>
                    <th>Tahun berdiri</th><th>:</th><td>{{ $c->founded_at }}</td>
                  </tr>
                  <tr>
                    <th>Luas wilayah</th><th>:</th><td>{{ $c->area }}</td>
                  </tr>
                  <tr>
                    <th>Jumlah penduduk</th><th>:</th><td>{{ $c->population }}</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <div class="modal-footer border-0">
            <span class="d-none" style="font-size: 12px">
              Sumber : Wikipedia
            </span>
          </div>
        </div>
      </div>
    </div>

    @foreach ($c->encyclopedia as $e)
      <div class="modal fade" id="encyclopedia{{ $e->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header border-0 pb-0">
              <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-0">
              <div class="row">
                <div class="col-12 col-md-5 d-flex">
                  <img src="/assets/img/encyclopedia/{{ $e->image }}" class="m-auto rounded-3" alt="" style="max-width: 300px">
                </div>
                <div class="col-12 col-md-7 text-center text-md-start">
                  <h3 class="my-4">{{ $e->title }}</h3>
                  <p>{{ $e->description }}</p>
                </div>
              </div>
            </div>
            <div class="modal-footer border-0 pt-0">
              <span style="font-size: 12px">
                Sumber : <a href="{{ $e->source }}" target="_blank">{{ parse_url($e->source, PHP_URL_HOST) }}</a>
              </span>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  @endforeach


</section>