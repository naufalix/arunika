<!DOCTYPE html>
<html lang="en">
  <!--begin::Head-->
  <head>
    @include('partials.admin-head')
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body>
    <!--begin::Main-->
    <script>
      @if(session()->has('success'))
        Swal.fire({title:'Success', html:'{!!session('success')!!}', icon:'success'})
      @endif
      @if(session()->has('error'))
        Swal.fire({title:'Error!', html:'{!!session('error')!!}', icon:'error'})
      @endif
      @if(session()->has('info'))
        Swal.fire({title:'Info', html:'{!!session('info')!!}', icon:'info'})
      @endif
      @if(isset($success))
        Swal.fire({title:'Success', text:'{{$success}}', icon:'success'})
      @endif
      @if(isset($error))
        Swal.fire({title:'Error!', text:'{{$error}}', icon:'error'})
      @endif
      @if($errors->any())
        Swal.fire({title:'Error!', html:'{!! implode('', $errors->all(':message<br>')) !!}', icon:'error'})
      @endif
    </script>
    <div class="d-flex flex-column flex-root" style="zoom: 90%;">
      <div class="docs-page d-flex flex-row flex-column-fluid">
        @include('partials.admin-sidebar')
        <div class="docs-wrapper d-flex flex-column flex-row-fluid" id="kt_docs_wrapper">
          @include('partials.admin-header')
          <div class="docs-content d-flex flex-column flex-column-fluid" id="kt_docs_content">
            <!--begin::Container-->
            <div class="container" id="kt_docs_content_container">
              <!--begin::Card-->
              @yield('content')
              <!--end::Card-->
            </div>
            <!--end::Container-->
          </div>
          @include('partials.admin-footer')
        </div>
      </div>
    </div>
    <!--end::Main-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
      <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
      <span class="svg-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
          <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
          <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
        </svg>
      </span>
      <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->
    @include('partials.admin-script')
    @yield('script')
  </body>
  <!--end::Body-->
</html>