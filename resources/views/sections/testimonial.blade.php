<section id="testimonial">
  
  <div class="container aos-init aos-animate" data-aos="fade-up">
    <div class="section-title aos-init aos-animate" data-aos="zoom-out">
      <h5 class="text-primary" lang-id="ts1">Testimoni</h5>
      <h2 class="h-bg" lang-id="ts2">Kata Mereka</h2>
      <p class="col-md-4 mx-auto" lang-id="ts3">Temukan inspirasi dan rekomendasi dari sesama pengguna yang telah mencoba tur virtual dan ensiklopedia budaya</p>
    </div>
  </div>

  <div class="container px-md-5">
    <div class="d-flex py-3">
      
      <div class="my-auto">
        <button type="button" class="btn btn-light btn-floating shadow-0 testimonial-prev">
          <i class="bi bi-chevron-left"></i>
        </button>
      </div>
      
      <div class="swiper mySwiper3">
        <div class="swiper-wrapper">
          
          @foreach ($testimonials as $t)
          <div class="swiper-slide d-flex align-items-stretch">
            <div class="card p-3 rounded-6">
          
              <div class="d-flex mb-2">
                <div class="me-3 my-auto">
                  <img src="/assets/img/testimonials/{{ $t->image }}" class="my-auto rounded-circle" alt="" style="width: 50px">
                </div>
                <div class="text-start"> 
                  <h6 class="mb-0 fw-bold">{{ $t->name }}</h6>
                  <p class="mb-0" style="font-size: 12px">{{ $t->position }}</p>
                </div>
              </div>
              <p style="font-size: 14px">
                {{ $t->review }}
              </p>
            </div>

          </div>
          @endforeach
        </div>
      </div>

      <div class="my-auto">
        <button type="button" class="btn btn-light btn-floating shadow-0 testimonial-next">
          <i class="bi bi-chevron-right"></i>
        </button>
      </div>

    </div>
    <div class="d-flex pt-3">
      <button type="button" class="btn btn-light mx-auto shadow-0 rounded-4" data-mdb-modal-init data-mdb-target="#review" lang-id="ts4">Kirim ulasan</button>
    </div>
  </div>

  <div class="modal fade" id="review" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        
        <div class="modal-header border-0 pb-0 d-flex">
          <button class="ms-auto border-0" type="button" data-mdb-dismiss="modal" aria-label="Close">
            <i class="bi bi-x-lg"></i>
          </button>
        </div>
        
        {{-- <button type="button" class="btn-close p-3" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button> --}}
        <div class="modal-body pt-0">
          <div class="row">
            <div class="col-12">
              <h5 class="m-0 mt-4 text-primary" lang-id="ts5">Kirimkan ulasan anda</h5>
              <p lang-id="ts6">Bagikan pengalaman anda menggunakan website ini!</p>
              <label class="my-2" lang-id="ts7">Nama anda</label>
              <input type="text" class="form-control mb-2 rounded-5" placeholder="Naufal Ulinnuha">
              <label class="my-2" lang-id="ts8">Siapakah anda</label>
              <input type="text" class="form-control mb-2 rounded-5" placeholder="Siswa SD">
              <label class="my-2" lang-id="ts9">Ulasan anda</label>
              <textarea class="form-control rounded-5" rows="3" placeholder="Maksimal 400 karakter"></textarea>
              <div class="d-grid gap-2 mt-4">
                <button class="btn btn-primary rounded-5" type="button" data-mdb-ripple-init lang-id="ts10">Kirim ulasan</button>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

</section>