@extends('frontend.master')

@section('content')

<section class="page-title-section overlay" data-background="images/banner/banner-1.jpg">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="{{route('features')}}">MessLife Features</a></li>
          <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
        </ul>
        <p class="text-lighten">The project "Mess Management System (Mess Life)" which is completely a web application. Both admin and member are the key users of this entire web system.
     
        Manager will register new members and even new admin (if necessary) by entering their details into the system. Manager will also be able to manage the bazaar schedules, meal request confirmation, and payment media for the registered members. Again, changing the user’s credentials like username and password is another important function, each and every user will be allowed to do that. In a nutshell admin will be able to access each and every functionalities of the system. Besides admin can also delete users account. 
        </p>
      </div>
    </div>
  </div>
</section>





@stop