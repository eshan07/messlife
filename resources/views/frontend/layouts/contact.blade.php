@extends('frontend.master')

@section('content')

<section class="page-title-section overlay" data-background="images/banner/banner-1.jpg">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="{{route('contact')}}">Contact Us</a></li>
          <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
        </ul>
        <p class="text-lighten">...</p>
      </div>
    </div>
  </div>
</section>
<style type="text/css">
  .contact{
    padding: 4%;
    height: 400px;
  }

  .contact-info{
    margin-top:10%;
  }
  .contact-info img{
    margin-bottom: 15%;
  }
  .contact-info h2{
    margin-bottom: 10%;
  }

  .contact-form label{
    font-weight:600;
  }
  .contact-form button{
    background: #25274d;
    color: #fff;
    font-weight: 600;
    width: 25%;
  }
  .contact-form button:focus{
    box-shadow:none;
  }
</style>

        @if (session('message'))
    <div class="alert alert-success">
      <center>  {{ session('message') }}</center>
    </div>
@endif
<div class="container contact" style="margin-bottom: 30%">
  <div class="row">
    <div class="col-md-4">
      <div class="contact-info">
        <img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image"/>
        <h4>We would love to hear from you !</h4><br><br>
        <h3>Address</h3>
           <ul class="list-unstyled">
            <li class="mb-2">1204/4 Kazi Nazrul Avenue</li>
            <li class="mb-2">Uttara, Dhaka</li>
            <li class="mb-2">+1 (2) 345 6789</li>
            <li class="mb-2">contact@messlife.com</li>
          </ul>

      </div>
    </div>

    <div class="col-md-8">
                  <form action="{{route('sendfeedback')}}" method="POST">
      <div class="contact-form">

          @csrf
        <div class="form-group">
          <label class="control-label col-sm-2" for="fname">First Name:</label>
          <div class="col-sm-10">          
          <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="lname">Last Name:</label>
          <div class="col-sm-10">          
          <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Email:</label>
          <div class="col-sm-10">
          <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="comment">Comment:</label>
          <div class="col-sm-10">
          <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
          </div>
        </div>
        <div class="form-group">        
          <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Submit</button>
          </div>
        </div>
     
      </div>
            </form>
    </div>
 
  </div>
</div>


@stop