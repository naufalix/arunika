@extends('layouts.dashboard')

@section('content')

<div class="card mb-2">
  <!--begin::Card Body-->
  <div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">
    <!--begin::Section-->
    <div>
      <!--begin::Heading-->
      <div class="col-12 d-flex">
        <h1 class="anchor fw-bolder mb-5" id="striped-rounded-bordered">Manage Testimoni</h1>
        <button class="ms-auto btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">Add new</button>
      </div>
      <!--end::Heading-->
      <!--begin::Block-->
      <div class="my-5 table-responsive">
        <table id="myTable" class="table table-striped table-hover table-rounded border gs-7">
          <thead>
            <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
              <th class="d-none">Sort</th>
              <th>Nama</th>
              <th style="min-width: 400px">Review</th>
              <th style="min-width: 120px">Terakhir diubah</th>
              <th style="min-width: 90px">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($testimonials as $t)
            @php
              $updated = date_create($t->updated_at);
            @endphp
            <tr>
              <td class="d-none">{{$loop->iteration}}</td>
              <td style="min-width: 320px;">
                <div class="d-flex">
                  <div class="symbol symbol-30px me-5 my-auto" data-bs-toggle="modal" data-bs-target="#foto" onclick="foto('{{ $t->image }}')">
                    <img src="/assets/img/testimonials/{{ $t->image }}" class="h-30 align-self-center of-cover rounded-circle" alt="">
                  </div>
                  <div>
                    {{ $t->name }} <br> <i>{{ $t->position }}</i>
                  </div>
                </div>
              </td>
              <td>{{ $t->review }}</td>
              <td>{{date_format($updated,"d/m/Y H:i")}}</td>
              <td>
                <a href="#" class="btn btn-icon btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#edit" onclick="edit({{ $t->id }})"><i class="bi bi-pencil-fill"></i></a>
                <a href="#" class="btn btn-icon btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapus" onclick="hapus({{ $t->id }})"><i class="fa fa-times"></i></a>
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
        <h3 class="modal-title">Tambah testimoni</h3>
        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
          <i class="bi bi-x-lg"></i>
        </div>
      </div>

      <form class="form" method="post" action="" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="row g-9">
            <div class="col-12 col-md-4">
              <label class="required fw-bold mb-2">Nama</label>
              <input type="text" class="form-control" name="name" required>
            </div>
            <div class="col-12 col-md-4">
              <label class="required fw-bold mb-2">Posisi</label>
              <input type="text" class="form-control" name="position" required>
            </div>
            <div class="col-12 col-md-4">
              <label class="required fw-bold mb-2">Upload foto</label>
              <input type="file" class="form-control" name="image" required>
            </div>
            <div class="col-12">
              <label class="required fw-bold mb-2">Review</label>
              <textarea class="form-control" rows="8" name="review" required></textarea>
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
          <h3 class="modal-title" id="et">Edit testimoni</h3>
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
                <label class="required fw-bold mb-2">Nama</label>
                <input type="text" class="form-control" name="name" required>
              </div>
              <div class="col-12 col-md-4">
                <label class="required fw-bold mb-2">Posisi</label>
                <input type="text" class="form-control" name="position" required>
              </div>
              <div class="col-12 col-md-4">
                <label class="required fw-bold mb-2">Upload foto</label>
                <input type="file" class="form-control" name="image">
              </div>
              <div class="col-12">
                <label class="required fw-bold mb-2">Review</label>
                <textarea class="form-control" rows="8" name="review" required></textarea>
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
          <h3 class="modal-title">Hapus testimoni</h3>
          <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
            <i class="bi bi-x-lg"></i>
          </div>
        </div>
        <form class="form" method="post" action="">
          @csrf
          <div class="modal-body text-center">
            <input type="hidden" class="d-none" id="hi" name="id">
            <p class="fw-bold mb-2 fs-4" id="hd">Apakah anda yakin ingin menghapus testimoni ini?</p>
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
    $("#img-view").attr("src","/assets/img/testimonials/"+image);
  }
  function edit(id){
    $.ajax({
      url: "/api/testimonial/"+id,
      type: 'GET',
      dataType: 'json', // added data type
      success: function(response) {
        var mydata = response.data;
        $('#edit input[name="id"]').val(id);
        $('#edit input[name="name"]').val(mydata.name);
        $('#edit input[name="position"]').val(mydata.position);
        $('#edit textarea[name="review"]').val(mydata.review);
        $("#et").text("Edit "+mydata.name);
      }
    });
  }
  function hapus(id){
    $.ajax({
      url: "/api/testimonial/"+id,
      type: 'GET',
      dataType: 'json', // added data type
      success: function(response) {
        //alert(JSON.stringify(mydata));
        var mydata = response.data;
        $("#hi").val(id);
        $("#hd").text("Apakah anda yakin ingin menghapus "+mydata.name+"?");
      }
    });
  }
</script>
@endsection