@extends('layouts.dashboard')

@section('content')

<div class="card mb-2">
  <!--begin::Card Body-->
  <div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">
    <!--begin::Section-->
    <div>
      <!--begin::Heading-->
      <div class="col-12 d-flex">
        <h1 class="anchor fw-bolder mb-5" id="striped-rounded-bordered">Manage Kota</h1>
        <button class="ms-auto btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">Tambah</button>
      </div>
      <!--end::Heading-->
      <!--begin::Block-->
      <div class="my-5 table-responsive">
        <table id="myTable" class="table table-striped table-hover table-rounded border gs-7">
          <thead>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
              <th>No.</th>
              <th style="min-width: 150px">Nama kota</th>
              <th style="min-width: 300px">Deskripsi</th>
              <th style="min-width: 120px">Koordinat</th>
              <th style="min-width: 100px">Data</th>
              <th style="min-width: 120px">Terakhir diubah</th>
              <th style="min-width: 90px">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($cities as $c)
            @php
              $updated = date_create($c->updated_at);
            @endphp
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>
                <div class="symbol symbol-30px me-5" data-bs-toggle="modal" data-bs-target="#foto" onclick="foto('{{ $c->image }}')">
                  <img src="/assets/img/city/{{ $c->image }}" class="h-30 align-self-center of-cover rounded-0" alt="">
                </div>
                {{ $c->name }}  
              </td>
              <td>
                {{ strlen($c->description) > 100 ? substr($c->description, 0, 100) . '...' : $c->description }}
              </td>
              <td>
                <span class="badge badge-primary" title="Latitude">{{ $c->latitude }}</span>
                <span class="badge badge-primary" title="Longitude">{{ $c->longitude }}</span>
              </td>
              <td>
                <span class="badge badge-primary" title="Ensiklopedia" >{{ $c->encyclopedia->count() }}</span>
                <span class="badge badge-primary" title="Agenda Budaya" >{{ $c->cultural->count() }}</span>
                <span class="badge badge-primary" title="Destinasi Wisata" >{{ $c->tourism->count() }}</span>
              </td>
              <td>{{date_format($updated,"d/m/Y H:i")}}</td>
              <td>
                <a href="#" class="btn btn-icon btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#edit" onclick="edit({{ $c->id }})"><i class="bi bi-pencil-fill"></i></a>
                <a href="#" class="btn btn-icon btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapus" onclick="hapus({{ $c->id }})"><i class="fa fa-times"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!--end::Block-->
    </div>
    <!--end::Section-->
  </div>
  <!--end::Card Body-->
</div>

<div class="modal fade" tabindex="-1" id="tambah">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Tambah Kota</h3>
        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
          <i class="bi bi-x-lg"></i>
        </div>
      </div>

      <form class="form" method="post" action="" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="row g-9">
            <div class="col-12 col-md-4">
              <label class="required fw-bold mb-2">Nama kota</label>
              <input type="text" class="form-control" name="name" required>
            </div>
            <div class="col-12 col-md-4">
              <label class="required fw-bold mb-2">Upload logo</label>
              <input type="file" class="form-control" name="image" required>
            </div>
            <div class="col-6 col-md-2">
              <label class="required fw-bold mb-2">Latitude</label>
              <input type="text" class="form-control" name="latitude" required>
            </div>
            <div class="col-6 col-md-2">
              <label class="required fw-bold mb-2">Longitude</label>
              <input type="text" class="form-control" name="longitude" required>
            </div>
            <div class="col-12 col-md-4">
              <label class="required fw-bold mb-2">Tahun berdiri</label>
              <input type="text" class="form-control" name="founded_at" required>
            </div>
            <div class="col-6 col-md-4">
              <label class="required fw-bold mb-2">Jumlah penduduk</label>
              <input type="text" class="form-control" name="population" required>
            </div>
            <div class="col-6 col-md-4">
              <label class="required fw-bold mb-2">Luas wilayah</label>
              <input type="text" class="form-control" name="area" required>
            </div>
            <div class="col-12">
              <label class="required fw-bold mb-2">Deskripsi</label>
              <textarea class="form-control" name="description" rows="5" required></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" name="submit" value="store">Submit</button>
        </div>
      </form>  
      
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" id="edit">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="et">Edit Kota</h3>
          <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
            <i class="bi bi-x-lg"></i>
          </div>
        </div>
        <form class="form" method="post" action="" enctype="multipart/form-data">
          @csrf
          <input type="hidden" id="eid" name="id">
          <div class="modal-body">
            <div class="row g-9">
              <div class="col-12 col-md-4">
                <label class="required fw-bold mb-2">Nama kota</label>
                <input type="text" class="form-control" name="name" required>
              </div>
              <div class="col-12 col-md-4">
                <label class="required fw-bold mb-2">Upload logo</label>
                <input type="file" class="form-control" name="image">
              </div>
              <div class="col-6 col-md-2">
                <label class="required fw-bold mb-2">Latitude</label>
                <input type="text" class="form-control" name="latitude" required>
              </div>
              <div class="col-6 col-md-2">
                <label class="required fw-bold mb-2">Longitude</label>
                <input type="text" class="form-control" name="longitude" required>
              </div>
              <div class="col-12 col-md-4">
                <label class="required fw-bold mb-2">Tahun berdiri</label>
                <input type="text" class="form-control" name="founded_at" required>
              </div>
              <div class="col-6 col-md-4">
                <label class="required fw-bold mb-2">Jumlah penduduk</label>
                <input type="text" class="form-control" name="population" required>
              </div>
              <div class="col-6 col-md-4">
                <label class="required fw-bold mb-2">Luas wilayah</label>
                <input type="text" class="form-control" name="area" required>
              </div>
              <div class="col-12">
                <label class="required fw-bold mb-2">Deskripsi</label>
                <textarea class="form-control" name="description" rows="5" required></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" name="submit" value="update">Simpan</button>
          </div>
        </form>
      </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" id="hapus">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Hapus Kota</h3>
          <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
            <i class="bi bi-x-lg"></i>
          </div>
        </div>
        <form class="form" method="post" action="">
          @csrf
          <div class="modal-body text-center">
            <input type="hidden" class="d-none" id="hi" name="id">
            <p class="fw-bold mb-2 fs-3">"<span id="hd"></span>"</p>
            <p class="mb-2 fs-4">Apakah anda yakin ingin menghapus Kota ini?</p>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger" name="submit" value="destroy">Hapus</button>
          </div>
        </form>
      </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" id="foto">
  <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="ft">View image</h3>
          <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
            <i class="bi bi-x-lg"></i>
          </div>
        </div>
        <div class="modal-body d-flex">
          <img class="mx-auto" id="img-view" src="" style="height:100%">
        </div>
      </div>
  </div>
</div>

<script type="text/javascript">
  function foto(image){
    $("#img-view").attr("src","/assets/img/city/"+image);
  }

  function edit(id){
    $.ajax({
      url: "/api/city/"+id,
      type: 'GET',
      dataType: 'json', // added data type
      success: function(response) {
        var mydata = response.data;
        $('#edit input[name="id"]').val(id);
        $('#edit input[name="name"]').val(mydata.name);
        $('#edit textarea[name="description"]').val(mydata.description);
        $('#edit input[name="founded_at"]').val(mydata.founded_at);
        $('#edit input[name="population"]').val(mydata.population);
        $('#edit input[name="area"]').val(mydata.area);
        $('#edit input[name="latitude"]').val(mydata.latitude);
        $('#edit input[name="longitude"]').val(mydata.longitude);
        $("#et").text("Edit "+mydata.name);
      }
    });
  }
  function hapus(id){
    $.ajax({
      url: "/api/city/"+id,
      type: 'GET',
      dataType: 'json', // added data type
      success: function(response) {
        //alert(JSON.stringify(mydata));
        var mydata = response.data;
        $("#hi").val(id);
        $("#hd").text(mydata.name);
      }
    });
  }
</script>
@endsection