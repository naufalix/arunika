<style>
  #testimonial img{
    aspect-ratio: 1/1;
    object-fit: cover;
  }
  #testimonial button{
    width: 32px;
    height: 32px;
    z-index: 2;
  }
  #testimonial .testimonial-prev{
    margin-right: -8px;
  }
  #testimonial .testimonial-next{
    margin-left: -8px;
  }
</style>
<section id="testimonial" style="background-color: #385F5C">
  
  <div class="container aos-init aos-animate" data-aos="fade-up">
    <div class="section-title text-white aos-init aos-animate" data-aos="zoom-out">
      <h5>Testimoni</h5>
      <h2>Kata Mereka</h2>
      <p class="col-md-4 mx-auto">Temukan inspirasi dan rekomendasi dari sesama pengguna yang telah mencoba tur virtual dan ensiklopedia budaya</p>
    </div>
  </div>

  <div class="container px-md-5">
    <div class="d-flex">
      
      <div class="my-auto">
        <button type="button" class="btn btn-light btn-floating shadow-0 testimonial-prev">
          <i class="bi bi-chevron-left"></i>
        </button>
      </div>
      
      <div class="swiper mySwiper3">
        <div class="swiper-wrapper">
          @foreach ($testimonials as $t)
          <div class="swiper-slide d-flex align-items-stretch">
            <div class="card p-3">
          
              <div class="d-flex mb-2">
                <div class="me-3 my-auto">
                  <img src="/assets/img/testimonials/{{ $t->image }}" class="my-auto rounded-circle" alt="" style="width: 50px">
                </div>
                <div class="text-start"> 
                  <p class="mb-0 fw-bold">{{ $t->name }}</p>
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
  </div>

</section>