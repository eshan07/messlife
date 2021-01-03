@extends('frontend.master')

@section('content')

<section class="page-title-section overlay" data-background="images/banner/banner-1.jpg">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="{{route('about')}}">Member Roles</a></li>
          <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
        </ul>
                <br><br>
        <ul class="text-lighten" style="list-style-type:disc; font-size: 20px">
          <li>Manager meal with quantity</li>
          <li>Pay all dues and get confirmation</li>
          <li>View bazaar schedule</li>
          <li>View cost details, Notices, Disciplinary</li>
        </ul>
      </div>
    </div>
  </div>
</section>

@stop