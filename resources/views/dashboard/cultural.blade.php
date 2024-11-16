@extends('layouts.dashboard')

@section('content')

<div class="card mb-2">
  <!--begin::Card Body-->
  <div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">
    <!--begin::Section-->
    <div>
      <!--begin::Heading-->
      <div class="col-12 d-flex">
        <h1 class="anchor fw-bolder mb-5" id="striped-rounded-bordered">Manage Agenda Budaya</h1>
        <button class="ms-auto btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">Tambah</button>
      </div>
      <!--end::Heading-->
      <!--begin::Block-->
      <div class="my-5 table-responsive">
        <table id="myTable" class="table table-striped table-hover table-rounded border gs-7">
          <thead>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
              <th>No.</th>
              <th style="min-width: 200px">Judul</th>
              <th style="min-width: 200px">Tempat</th>
              <th>Kota</th>
              <th style="width: 115px">Tanggal</th>
              <th style="width: 80px">Harga</th>
              <th style="width: 120px">Terakhir diubah</th>
              <th style="width: 90px">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($culturals as $cu)
            @php
              $updated = date_create($cu->updated_at);
            @endphp
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>
                <div class="symbol symbol-30px me-5" data-bs-toggle="modal" data-bs-target="#foto" onclick="foto('{{ $cu->image }}')">
                  <img src="/assets/img/cultural/{{ $cu->image }}" class="h-30 align-self-center of-cover rounded-0" alt="">
                </div>
                {{ $cu->title }}  
              </td>
              <td>{{ $cu->place }}</td>
              <td><span class="badge badge-primary">{{ $cu->city->name }}</span></td>
              <td>{{ $cu->date }}</td>
              <td>{{ $cu->price }}</td>
              <td>{{date_format($updated,"d/m/Y H:i")}}</td>
              <td>
                <a href="#" class="btn btn-icon btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#edit" onclick="edit({{ $cu->id }})"><i class="bi bi-pencil-fill"></i></a>
                <a href="#" class="btn btn-icon btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapus" onclick="hapus({{ $cu->id }})"><i class="fa fa-times"></i></a>
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
        <h3 class="modal-title">Tambah Agenda Budaya</h3>
        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
          <i class="bi bi-x-lg"></i>
        </div>
      </div>

      <form class="form" method="post" action="" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="row g-9">
            <div class="col-12 col-md-6">
              <label class="required fw-bold mb-2">Judul</label>
              <input type="text" class="form-control" name="title" required>
            </div>
            <div class="col-12 col-md-6">
              <label class="required fw-bold mb-2">Foto</label>
              <input type="file" class="form-control" name="image" required>
            </div>
            <div class="col-12 col-md-8">
              <label class="required fw-bold mb-2">Tempat</label>
              <input type="text" class="form-control" name="place" required>
            </div>
            <div class="col-12 col-md-4">
              <label class="required fw-bold mb-2">Kota</label>
              <select class="form-select" name="city_id" required>
                @foreach ($cities as $c)
                  <option value="{{$c->id}}">{{$c->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-12 col-md-6">
              <label class="required fw-bold mb-2">Tanggal</label>
              <input type="text" class="form-control" name="date" required>
            </div>
            <div class="col-12 col-md-6">
              <label class="required fw-bold mb-2">Harga</label>
              <input type="text" class="form-control" name="price" required>
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
          <h3 class="modal-title" id="et">Edit Agenda Budaya</h3>
          <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
            <i class="bi bi-x-lg"></i>
          </div>
        </div>
        <form class="form" method="post" action="" enctype="multipart/form-data">
          @csrf
          <input type="hidden" id="eid" name="id">
          <div class="modal-body">
            <div class="row g-9">
              <div class="col-12 col-md-6">
                <label class="required fw-bold mb-2">Judul</label>
                <input type="text" class="form-control" name="title" required>
              </div>
              <div class="col-12 col-md-6">
                <label class="required fw-bold mb-2">Upload foto</label>
                <input type="file" class="form-control" name="image">
              </div>
              <div class="col-12 col-md-8">
                <label class="required fw-bold mb-2">Tempat</label>
                <input type="text" class="form-control" name="place" required>
              </div>
              <div class="col-12 col-md-4">
                <label class="required fw-bold mb-2">Kota</label>
                <select class="form-select" name="city_id" required>
                  @foreach ($cities as $c)
                    <option value="{{$c->id}}">{{$c->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-12 col-md-6">
                <label class="required fw-bold mb-2">Tanggal</label>
                <input type="text" class="form-control" name="date" required>
              </div>
              <div class="col-12 col-md-6">
                <label class="required fw-bold mb-2">Harga</label>
                <input type="text" class="form-control" name="price" required>
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
          <h3 class="modal-title">Hapus Agenda Budaya</h3>
          <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
            <i class="bi bi-x-lg"></i>
          </div>
        </div>
        <form class="form" method="post" action="">
          @csrf
          <div class="modal-body text-center">
            <input type="hidden" class="d-none" id="hi" name="id">
            <p class="fw-bold mb-2 fs-3">"<span id="hd"></span>"</p>
            <p class="mb-2 fs-4">Apakah anda yakin ingin menghapus Agenda Budaya ini?</p>
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
        <div class="modal-body">
          <img id="img-view" src="" style="width:100%">
        </div>
      </div>
  </div>
</div>

<script type="text/javascript">

  function foto(image){
    $("#img-view").attr("src","/assets/img/cultural/"+image);
  }
  function edit(id){
    $.ajax({
      url: "/api/cultural/"+id,
      type: 'GET',
      dataType: 'json', // added data type
      success: function(response) {
        var mydata = response.data;
        $('#edit input[name="id"]').val(id);
        $('#edit input[name="title"]').val(mydata.title);
        $('#edit input[name="date"]').val(mydata.date);
        $('#edit input[name="place"]').val(mydata.place);
        $('#edit input[name="price"]').val(mydata.price);
        $('#edit select[name="city_id"]').val(mydata.city_id);
        $("#et").text("Edit "+mydata.title);
      }
    });
  }
  function hapus(id){
    $.ajax({
      url: "/api/cultural/"+id,
      type: 'GET',
      dataType: 'json', // added data type
      success: function(response) {
        //alert(JSON.stringify(mydata));
        var mydata = response.data;
        $("#hi").val(id);
        $("#hd").text(mydata.title);
      }
    });
  }
</script>
@endsection