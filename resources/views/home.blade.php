@extends('layouts.index')

@section('content')
  @include('sections.hero')
  @include('sections.map')

  <section style="background-color: #FFF;">
    <div style="background-color: #FFF; height: 100px; border-radius: 0px 0px 40px 40px;"></div>
  </section>
  
  @include('sections.city')
  @include('sections.virtual')
  @include('sections.testimonial')
  {{-- @include('sections.sample') --}}
@endsection

@section('script')

@endsection