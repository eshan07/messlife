@extends('backend.master')
    
@section('content') 
<style type="text/css">
	
.main-panel > .content {

    margin-top: 70px;
    padding: 0px;
    min-height: calc(100vh - 123px);

}
    .card.card-cascade .view.gradient-card-header {
            padding: 1.1rem 1rem;
        }

        .card.card-cascade .view {
            box-shadow: 0 5px 12px 0 rgba(0, 0, 0, 0.2), 0 2px 8px 0 rgba(0, 0, 0, 0.19);
        }

</style> 
<link rel="stylesheet" type="text/css" href="https://mdbootstrap.com/previews/templates/admin-dashboard/css/mdb.min.css">

  
 <div class="container-fluid">

      <!-- Section: Edit Account -->
      <section class="section">
        <!-- First row -->
        <div class="row">
          <!-- First column -->
          <div class="col-lg-4 mb-4">

            <!-- Card -->
            <div class="card card-cascade narrower">

              <!-- Card image -->
              <div class="view view-cascade gradient-card-header mdb-color lighten-3">
                <h5 class="mb-0 font-weight-bold">Your Photo</h5>
              </div>
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">
                <img src="{{url('/uploads/users').'/'.Auth()->user()->image}}" alt="User Photo" class="z-depth-1 mb-3 mx-auto" style="width: 100px ; height: 130px" />

<!--                 <p class="text-muted"><small>Profile photo will be changed automatically</small></p>
                <div class="row flex-center">
                  <button class="btn btn-info btn-rounded btn-sm">Upload New Photo</button><br>
                  <button class="btn btn-danger btn-rounded btn-sm">Delete</button>
                </div> -->
              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->

          </div>
          <!-- First column -->

          <!-- Second column -->
          <div class="col-lg-8 mb-4">

            <!-- Card -->
            <div class="card card-cascade narrower">

              <!-- Card image -->
              <div class="view view-cascade gradient-card-header mdb-color lighten-3">
                <h5 class="mb-0 font-weight-bold">Edit Account</h5>
              </div>
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">
                      @if(session('message'))
         <center> <div class="alert alert-success" >
                {{session('message')}}
          </div> </center> 
        @endif 
                <!-- Edit Form -->
                <form action="{{route('editprofile')}}" method="POST" >
                  @csrf
                  <!-- First row -->

                  <div class="row">

                    <!-- First column -->
                    <div class="col-md-12">
                      <div class="md-form mb-0">
                        <input type="text" id="form1" class="form-control validate" value="{{Auth()->user()->mess->mess_name}}" disabled>
                        <label for="form1" data-error="wrong" data-success="right">Mess Name</label>
                      </div>
                    </div>
                  </div>
                  <!-- First row -->

                  <!-- First row -->
                  <div class="row">
                    <!-- First column -->
                    <div class="col-md-6">
                      <div class="md-form mb-0">
                        <input type="text" id="form81" class="form-control validate" value="{{Auth()->user()->name}}" name="name" >
                        <label for="form81" data-error="wrong" data-success="right">Name</label>
                      </div>
                    </div>

                    <!-- Second column -->
                    <div class="col-md-6">
                      <div class="md-form mb-0">
                        <input type="text" id="form82" class="form-control validate" value="{{Auth()->user()->phone}}" readonly="">
                        <label for="form82">Phone</label>
                      </div>
                    </div>
                  </div>
                  <!-- First row -->

                  <!-- Second row -->
                  <div class="row">

                    <!-- First column -->
                    <div class="col-md-6">
                      <div class="md-form mb-0">
                        <input type="email" id="form76" class="form-control validate"  value="{{Auth()->user()->email}}" readonly="">
                        <label for="form76">Email address</label>
                      </div>
                    </div>
                    <!-- Second column -->

                    <div class="col-md-6">
                      <div class="md-form mb-0">
                        <input type="password" id="password" class="form-control validate" name="password">
                        <label for="password" data-error="wrong" data-success="right">New Password</label>
                      </div>
                    </div>
                  </div>
                  <!-- Second row -->

                  
                  <!-- Fourth row -->
                  <div class="row">
                    <div class="col-md-12 text-center my-4">
                      <button type="submit" class="btn btn-success btn-rounded">Update Account </button>
                    </div>
                  </div>
                  <!-- Fourth row -->

                </form>
                <!-- Edit Form -->

              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->

          </div>
          <!-- Second column -->

        </div>
        <!-- First row -->

      </section>
      <!-- Section: Edit Account -->

    </div>
    <script>
    // SideNav Initialization
    $(".button-collapse").sideNav();

    var container = document.querySelector('.custom-scrollbar');
    Ps.initialize(container, {
      wheelSpeed: 2,
      wheelPropagation: true,
      minScrollbarLength: 20
    });

  </script>

@stop