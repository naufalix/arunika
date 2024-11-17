<section class="py-5" style="background-color: #385F5C">
  
  <div class="container aos-init aos-animate" data-aos="fade-up">
    <div class="col-12 col-md-8 mx-auto">
      <h2 class="text-center text-white">Kata Mereka</h2>
      <p class="text-center text-white">
        Beragam pandangan yang orang lain miliki mengenai Yogyakarta, termasuk kekaguman pada kekayaan budayanya, keramahan masyarakatnya, keindahan alamnya, dan potensi besar yang dimiliki daerah ini. Dari wisatawan yang terpukau akan keindahan Yogyakarta hingga akademisi yang meneliti keberagaman budaya dan kekayaan sumber daya alamnya, Yogyakarta meninggalkan kesan mendalam di hati banyak orang.
      </p>
    </div>
  </div>

  <div class="container px-5">
    <div class="col-12 mx-auto row">

      @foreach ($testimonials as $t)
      <div class="col-12 col-md-4 mb-4 d-flex align-items-stretch">
        <div class="card p-2 p-md-3">
          
          <div class="d-flex">
            <div class="me-3 my-auto">
              <img src="/assets/img/testimonials/{{ $t->image }}" class="my-auto rounded-circle" alt="" style="width: 50px">
            </div>
            <div class="text-start"> 
              <p class="mb-0 fw-bold">{{ $t->name }}</p>
              <p class="mb-0" style="font-size: 12px">{{ $t->position }}</p>
            </div>
          </div>
          <p>
            {{ $t->review }}
          </p>
        </div>
      </div>
      @endforeach

    </div>
  </div>

</section>