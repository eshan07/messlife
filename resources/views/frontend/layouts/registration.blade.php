@extends('frontend.layouts.login')

@section('content')


<section class="page-title-section overlay" data-background="images/banner/banner-1.jpg">
  <div class="container">

 <!-- Material form register -->
<div class="card">

    <h5 class="card-header info-color white-text text-center py-4">
        <strong>Sign up</strong>
    </h5>
      @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form class="text-center" style="color: #757575;" action="{{route('do.registration')}}" method="POST">
          @csrf

            <div class="form-row">
                <div class="col">
                    <!-- Name -->
                    <div class="md-form">
                        <input type="text" id="materialRegisterFormFirstName"  name='name' class="form-control">
                        <label for="materialRegisterFormFirstName">Name</label>
                    </div>
                </div>

            </div>

            <!-- Mess Name -->
            <div class="md-form mt-0">
                <input type="text" id="messName" class="form-control" name="messName">
                <label for="materialRegisterFormEmail">Mess Name</label>
            </div>
            <!-- E-mail -->
            <div class="md-form mt-0">
                <input type="email" id="email" class="form-control" name="email">
                <label for="materialRegisterFormEmail">E-mail</label>
            </div>
            <!-- Phone -->
            <div class="md-form mt-0">
                <input type="text" id="phone" class="form-control" name="phone">
                <label for="materialRegisterFormEmail">Phone Number</label>
            </div>

            <!-- Password -->
            <div class="md-form">
                <input type="password" id="password" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock" name="password">
                <label for="materialRegisterFormPassword">Password</label>

            </div>

    

    
            <!-- Sign up button -->
            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Sign in</button>

            <!-- Social register -->
            <p>or sign up with:</p>

            <a type="button" class="btn-floating btn-fb btn-sm">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a type="button" class="btn-floating btn-tw btn-sm">
                <i class="fab fa-twitter"></i>
            </a>
            <a type="button" class="btn-floating btn-li btn-sm">
                <i class="fab fa-linkedin-in"></i>
            </a>
            <a type="button" class="btn-floating btn-git btn-sm">
                <i class="fab fa-github"></i>
            </a>

            <hr>

            <!-- Terms of service -->
            <p>By clicking
                <em>Sign up</em> you agree to our
                <a href="" target="_blank">terms of service</a>

        </form>
        <!-- Form -->

    </div>

</div>
<!-- Material form register -->

  </div>
</section>


@stop