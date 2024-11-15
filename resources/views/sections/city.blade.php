<style>
  #city .img-thumb{
    position: relative;
    transition: transform 0.5s ease-in-out;
  }
  #city .img-thumb:hover {
    transform: scale(1.1); /* Membesarkan gambar saat di-hover */
  }
  #city .img-thumb img{
    width: 100%; object-fit: cover;
  }
  .tag {
    cursor: pointer;
    align-content: end;
    width: 100%;
    height: 100%;
    float: left;
    position: absolute;
    left: 0px;
    top: 0px;
    z-index: 1000;
    background: linear-gradient(to bottom, transparent, #000000);
    padding: 12px;
    color: #FFFFFF;
    font-weight: bold;
    }
</style>

<section id="city" class="py-5" style="background-color: #98DED9;">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 d-flex">
        <div class="col-10 my-auto">
          <h2 class="h1">Yogyakarta</h2>
          <p>
            Yogyakarta adalah kota budaya di Indonesia yang kaya akan sejarah, seni, dan tradisi Jawa. Terkenal dengan Keraton, Malioboro, candi-candi seperti...
          </p>
          <button type="button" class="btn btn-primary mb-4" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#infographic">
            Infografis
          </button>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="row">
          <div class="col-6">
            <div class="img-thumb" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#encyclopedia">
              <div class="tag">Adat istiadat</div>
              <img src="/assets/img/city/yogyakarta/1.jpg" alt="" style="aspect-ratio: 16/9">
            </div>
            <br>
            <div class="img-thumb">
              <div class="tag">Tarian</div>
              <img src="/assets/img/city/yogyakarta/2.jpg" alt="" style="aspect-ratio: 1/1">
            </div>
          </div>
          <div class="col-6">
            <div class="img-thumb">
              <div class="tag">Bahasa Daerah</div>
              <img src="/assets/img/city/yogyakarta/3.jpg" alt="" style="aspect-ratio: 1/1">
            </div>
            <br>
            <div class="img-thumb">
              <div class="tag">Makanan hkas</div>
              <img src="/assets/img/city/yogyakarta/4.jpg" alt="" style="aspect-ratio: 16/9">
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-12 text-center mt-5">
        <a href="#collapseExample" class=" mx-auto btn btn-primary mb-3" data-mdb-collapse-init data-mdb-ripple-init role="button" aria-expanded="false" aria-controls="collapseExample">
          LIHAT TEMPAT WISATA
        </a>
        <div class="collapse mx-auto" id="collapseExample">
          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
          squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
          sapiente ea proident.
        </div>
      </div>

    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="infographic" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header border-0 pb-0">
          <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body pt-0">
          <div class="row">
            <div class="col-12 col-md-4 d-flex">
              <img src="/assets/img/city/yogyakarta/logo.png" class="m-auto" alt="" style="max-width: 100px">
            </div>
            <div class="col-12 col-md-8 text-center text-md-start">
              <h3 class="my-4">Yogyakarta</h3>
              <table class="col-12 text-start">
                <tr>
                  <th>Tahun berdiri</th><th>:</th><td>13 Maret 1755</td>
                </tr>
                <tr>
                  <th>Luas wilayah</th><th>:</th><td>3.185,80 km²</td>
                </tr>
                <tr>
                  <th>Jumlah penduduk</th><th>:</th><td>3.710.229 jiwa</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <div class="modal-footer border-0">
          <span style="font-size: 12px">
            Sumber : 
            <a href="https://id.wikipedia.org/wiki/Daerah_Istimewa_Yogyakarta" target="_blank">
              <img src="/assets/img/logo-wikipedia.png" alt="" style="width: 20px">
            </a>
          </span>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="encyclopedia" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header border-0 pb-0">
          <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body py-0">
          <div class="row">
            <div class="col-12 col-md-5 d-flex">
              <img src="/assets/img/city/yogyakarta/1.jpg" class="m-auto rounded-3" alt="" style="max-width: 300px">
            </div>
            <div class="col-12 col-md-7 text-center text-md-start">
              <h3 class="my-4">Adat istiadat</h3>
              <p>
                Saparan Bekakak / bekakak artinya korban penyembelihan hewan atau manusia. Dalam upacara adat ini, bekakak hanya berupa
              </p>
            </div>
          </div>
        </div>
        <div class="modal-footer border-0 pt-0">
          <span style="font-size: 12px">
            Sumber : <a href="https://www.kompasiana.com/siman23751/622ae63a7a36cd04f26d3c32/mengenal-upacara-tradisi-saparan-bekakak" target="_blank">Kompasiana</a>
          </span>
        </div>
      </div>
    </div>
  </div>


</section>