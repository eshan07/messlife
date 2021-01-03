@extends('frontend.master')

@section('content')

<section class="page-title-section overlay" data-background="images/banner/banner-1.jpg">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="{{route('manager')}}">Manager Roles</a></li>
          <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
        </ul>
        <br><br>
        <ul class="text-lighten" style="list-style-type:disc; font-size: 20px">
          <li>Manager can register himself along with mess name and can log in</li>
          <li>Mnage users</li>
          <li>Manage bazaar date</li>
          <li>manage user balance</li>
          <li>Manage notices </li>
          <li>Manage disciplinary</li>
          <li>Manage meals</li>
          <li>Manage payment</li>
        </ul>
      </div>
    </div>
  </div>
</section>

@stop