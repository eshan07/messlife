<header class="fixed-top header">
  <!-- top header -->
  <div class="top-header py-2 bg-white">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-lg-4 text-center text-lg-left">

          <ul class="list-inline d-inline">
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-facebook"></i></a></li>
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-twitter-alt"></i></a></li>
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-linkedin"></i></a></li>
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-instagram"></i></a></li> 
          </ul>
        </div>
        <div class="col-lg-8 text-center text-lg-right">
          <ul class="list-inline">

            <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="#">Documenation</a></li>
            @guest()
            <li class="list-inline-item">
              <a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="#" data-toggle="modal" data-target="#loginModal">login</a>
            </li>
            @endguest
            
            @auth()

            <li class="list-inline-item">
              <a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="{{route('admin')}}">
                <i class="material-icons" style="font-size:11px">dashboard</i>
              </a>
            </li>

            <li class="list-inline-item">
              <a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="{{route('logout')}}">Logout</a>
            </li>

            @endauth
             @guest()
            <li class="list-inline-item">
              <a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="#" data-toggle="modal" data-target="#signupModal">register
              </a>
            </li>
             @endguest

          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- navbar -->
  <div class="navigation w-100">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light p-0">
        <a class="navbar-brand" href="{{route('home')}}"><img src="./images/logo.png" alt=" " height="70px"></a>
        <button class="navbar-toggler rounded-0" type="button" data-toggle="collapse" data-target="#navigation"
          aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navigation">
          <ul class="navbar-nav ml-auto text-center">
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
              <a class="nav-link" href="{{route('home')}}">Home</a>
            </li>
            <li class="nav-item dropdown view {{ Request::is('manager') ? 'active' : '' }}  {{ Request::is('member') ? 'active' : '' }}">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Roles as
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item {{ Request::is('manager') ? 'active' : '' }}" href="{{route('manager')}}">Manager</a>
                <a class="dropdown-item {{ Request::is('member') ? 'active' : '' }}" href="{{route('member')}}">Member</a>
              </div>
            </li>

            <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
              <a class="nav-link" href="{{route('about')}}">About Us</a>
            </li>
            <li class="nav-item {{ Request::is('features') ? 'active' : '' }}">
              <a class="nav-link" href="{{route('features')}}">Features</a>
            </li>
            <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
              <a class="nav-link" href="{{route('contact')}}">CONTACT US</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
</header>

<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-0 border-0 p-4">
            <div class="modal-header border-0">
                <h3>Register Mess as Manager</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login">
                    <form action="{{route('do.registration')}}" class="row" method="POST">
                      @csrf
                        <div class="col-12">
                            <input type="text" class="form-control mb-3" id="signupName" name="name" placeholder="Name">
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control mb-3" id="messName" name="messName" placeholder="Mess Name">
                        </div>
                        <div class="col-12">
                            <input type="email" class="form-control mb-3" id="signupEmail" name="email" placeholder="Email">
                        </div>
                          <div class="col-12">
                            <input type="text" class="form-control mb-3" id="phone" name="phone" placeholder="Phone">
                        </div>

                        <div class="col-12">
                            <input type="password" class="form-control mb-3" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">SIGN UP</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-0 border-0 p-4">
            <div class="modal-header border-0">
                <h3>Login</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('do.login')}}" class="row" method="POST">
                  @csrf
                    <div class="col-12">
                        <input type="text" class="form-control mb-3" id="loginEmail" name="phone" placeholder="Type Valid Phone Number">
                    </div>

                    <div class="col-12">
                        <input type="password" class="form-control mb-3" id="loginPassword" name="password" placeholder="Password">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">LOGIN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>