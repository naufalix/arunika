<style>
  #maps {
    background-color: #8EACCD;
    border-radius: 0px 0px 40px 40px;
    background-image: url('/assets/img/bg-awan.png');
    background-repeat: no-repeat;
    background-size: contain;
  }
  #maps .select2{
    min-height: auto;
    transition: all .1s linear;
    box-shadow: none;
  }
  #maps .select2-selection__rendered{
    margin-top: auto;
    margin-block: auto;
  }
  #maps .select2-selection__arrow{
    display: none;
  }
  #maps .select2 .select2-selection{
    border-radius: 12px;
    height: 48px;
    display: flex;
  }
</style>

<section id="maps" class="pb-5">
  <div class="container aos-init aos-animate" data-aos="fade-up">
    <div class="section-title text-white aos-init aos-animate" data-aos="zoom-out">
      <h5>Jelajahi</h5>
      <h2>Peta Interaktif</h2>
      <p class="col-md-4 mx-auto">
        <i>Lorem Ipsum...</i>
      </p>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-10 mx-auto">
        <div class="p-4 p-md-5 rounded-9" style="background-color: #295F98;">
          <select name="" id="searchcity" class="form-control form-select rounded-6">
            <option selected disabled value="">Cari Daerah atau Kota disini...</option>
            @foreach ($cities as $c)
              <option value="{{$c->latitude}},{{$c->longitude}}">{{ $c->name }}</option>
            @endforeach
          </select>
          <br>
          <div id="map" class="rounded-6 mt-3" style="width: 100%; height: 400px;"></div>
        </div>
      </div>
      <div class="col-12 col-md-7 d-flex justify-content-center align-items-center" style="margin: -50px auto -230px auto;">
        <img src="/assets/img/buku.png" alt="" style="width: 100%">
      </div>
    </div>
  </div>
</section>