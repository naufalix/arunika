@extends('layouts.index')

@section('content')
  @include('sections.hero')
  @include('sections.map')

  <section style="background-color: #98DED9;">
    <div style="background-color: #FFF; height: 40px; border-radius: 0px 0px 40px 40px;"></div>
  </section>
  
  @include('sections.city')
  @include('sections.sample')
@endsection

@section('script')

@endsection