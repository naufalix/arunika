<style>
  #quotes{
    background-image: url('/assets/img/bg-quotes.webp');
    background-size: cover;
    background-position: center;
  }
  #quotes .bg-quotes{
    background-image: url('/assets/img/blue-75.png');
  }
  #quotes .card{
    width: fit-content;
    zoom: 0.8;
  }
  #quotes img{
    width: 50px;
    aspect-ratio: 1/1;
    object-fit: cover;
  }
  @media (max-width: 992px) {
    #quotes .card{
      zoom: 0.4;
    }
  }
</style>

<section id="quotes" class="p-0">
  <div class="bg-quotes p-md-5 py-5">
    <div class="container">
      <div class="text-center">
        <h3 class="text-white mb-4" lang-id="qt1">Budaya kuat, wujudkan Indonesia Emas 2045.</h3>
        
        <div class="d-flex">
          <div class="my-auto">
            <button type="button" class="btn btn-light btn-floating shadow-0 quotes-prev">
              <i class="bi bi-chevron-left"></i>
            </button>
          </div>

          <div class="swiper mySwiper4">
            <div class="swiper-wrapper">
              
              @php
                $quotes = [
                    [
                        'name' => 'Prof. Dr. Hj. Warih Handayaningrum, M.Pd.',
                        'position' => 'Dosen S2 Pendidikan Seni Budaya, dan S3 Pendidikan Seni, FBS UNESA',
                        'quote' => 'Seni dan budaya dianggap sebagai elemen penting yang dapat membantu Indonesia menghadapi tantangan global dengan membangun masyarakat yang adil dan sejahtera melalui penguatan identitas budaya.',
                    ],
                    [
                        'name' => 'Dr. Myra Puspasari Gunawan, S.T., M.T.',
                        'position' => 'Pengamat Pariwisata Nasional, Purnadosen Magister Perencanaan Kepariwisataan SAPPK ITB',
                        'quote' => 'Untuk kepariwisataan Indonesia 2045, kita harus beralih dari boosterism ke pendekatan berbasis pengetahuan. SDM pariwisata, kelestarian lingkungan, dan pemajuan budaya menjadi kunci strategi pengembangan destinasi dan keterlibatan ',
                    ],
                    [
                        'name' => 'Dina Mayasari Soeswoyo',
                        'position' => 'Dosen Pemasaran, Sekolah Tinggi Pariwisata Bogor',
                        'quote' => '"Potensi pariwisata Indonesia luar biasa: 17.000 pulau, 300 suku bangsa, dan kekayaan hayati. Dengan perencanaan matang, pariwisata berkelanjutan dapat mendukung ekonomi, sosial, budaya, dan lingkungan hingga Indonesia Emas 2045."',
                    ]
                ];
              @endphp
              @foreach ($quotes as $q)
              <div class="swiper-slide">
                <div class="">
                  <p class="text-white mb-4 col-md-8 mx-auto">
                    <sup><i class="fa fa-quote-left"></i></sup>
                    <i>{{ $q['quote'] }}</i>  
                    <sup><i class="fa fa-quote-right"></i></sup>
                  </p>
                  <div class="card mx-auto">
                    <div class="p-3 d-flex">
                      <div class="my-auto">
                        <img class="rounded-circle" src="/assets/img/quotes{{$loop->iteration}}.webp" alt="">
                      </div>
                      <div class="mx-3 text-start">
                        <p class="mb-0 fw-bold">{{ $q['name'] }}</p>
                        <p class="mb-0">{{ $q['position'] }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            
            </div>
          </div>

          <div class="my-auto">
            <button type="button" class="btn btn-light btn-floating shadow-0 quotes-next">
              <i class="bi bi-chevron-right"></i>
            </button>
          </div>
        
        </div>

      
      </div>
    </div>
  </div>
</section>