

<div class="sidebar" data-color="orange" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo" style="padding-left: 30%">
        <a class="navbar-brand" href="#"><img src="./images/logo.png" alt=" " height="60px"></a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">

          <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('admin')}}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>


          @if(Auth()->user()->role=='Manager')
          
      <li class="nav-item">

          <a class="nav-link collapsed" data-toggle="collapse" href="#laravelExample" aria-expanded="false" >
            <i class="material-icons">perm_contact_calendar</i>
                <p>Mess Control
              <b class="caret"></b>
                </p>  
            </a>
          <div class="collapse" id="laravelExample" style="">
          <ul class="nav">
          <li class="nav-item {{ Request::is('members') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('members')}}">
              <i class="material-icons">people</i>
              <p>Modify Members</p>
            </a>
          </li>

          <li class="nav-item ">
            <a class="nav-link" href="{{route('bazaars')}}">
              <i class="material-icons">add_shopping_cart</i>
              <p>Bazaar Schedule</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('BazaarCost') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('BazaarCost')}}">
              <i class="material-icons">date_range</i>
              <p>Bazaar Cost</p>
            </a>
          </li>

          <li class="nav-item {{ Request::is('current-day-meals') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('current-day-meals')}}">
              <i class="material-icons">recent_actors</i>
              <p>Current Day Meals</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('mealcostview') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('mealcostview')}}">
              <i class="material-icons">recent_actors</i>
              <p>Members Meal Cost</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('costs') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('costs')}}">
              <i class="material-icons">attach_money</i>
              <p>Total Cost</p>
            </a>
          </li>

<!--            <li class="nav-item {{ Request::is('costs') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('costs')}}">
              <i class="material-icons">recent_actors</i>
              <p>Total cost</p>
            </a>
          </li> -->
          <!-- 
           <li class="nav-item {{ Request::is('#') ? 'active' : '' }}">
            <a class="nav-link" href="#">
              <i class="material-icons">recent_actors</i>
              <p>Update Mess Information</p>
            </a>
          </li> -->
          </ul>
        </div>
      </li>
      @endif

       <li class="nav-item">
          <a class="nav-link collapsed" data-toggle="collapse" href="#laravel" aria-expanded="false">
            <i class="material-icons">fastfood</i>
                <p>Meal Information
              <b class="caret"></b>
                </p>
            </a>
          <div class="collapse" id="laravel" style="">
          <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="#"  data-toggle="modal" data-target="#addmealModal" data-animation-out="fadeOutDown" data-delay-out="2" data-duration-in=".3" data-animation-in="zoomIn" data-delay-in=".7">
              <i class="material-icons">add_box</i>
              <p>Add Meal</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{route('meals')}}">
              <i class="material-icons">view_column</i>
              <p>View Meals</p>
            </a>
          </li>
          </ul>
        </div>
      </li>

       <li class="nav-item">
          <a class="nav-link collapsed" data-toggle="collapse" href="#bazaar" aria-expanded="false">
            <i class="material-icons">shopping_cart</i>
                <p>bazaar Schedule
              <b class="caret"></b>
                </p>
            </a>
          <div class="collapse" id="bazaar" style="">
          <ul class="nav">

          <li class="nav-item  {{ Request::is('MyBazaar') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('MyBazaar')}}">
              <i class="material-icons">event</i>
              <p>My Bazaar Schedule</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('MonthlyBazaar') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('MonthlyBazaar')}}">
              <i class="material-icons">event</i>
              <p>Current Month bazaar</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('BazaarCost') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('BazaarCost')}}">
              <i class="material-icons">date_range</i>
              <p>Monthly bazaar Cost</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./user.html">
              <i class="material-icons">more</i>
              <p>Others</p>
            </a>
          </li>
          </ul>
        </div>
      </li>

             <li class="nav-item">
          <a class="nav-link collapsed" data-toggle="collapse" href="#cost" aria-expanded="false">
            <i class="material-icons">attach_money</i>
                <p>Cost Information
              <b class="caret"></b>
                </p>
            </a>
          <div class="collapse" id="cost" style="">
          <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="{{route('mealcost')}}">
              <i class="material-icons">assessment</i>
              <p>Meal Cost Details</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{route('paymentview')}}">
              <i class="material-icons">payment</i>
              <p>Payments</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('reports') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('reports')}}">
              <i class="material-icons">assignment</i>
              <p>Reports</p>
            </a>
          </li>
          </ul>
        </div>
      </li>

      <li class="nav-item {{ Request::is('message') ? 'active' : '' }}">
            <a class="nav-link" href="#">
              <i class="material-icons">message</i>
              <p>Messages</p>
            </a>
      </li>

        <li class="nav-item {{ Request::is('notices') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('notices')}}">
              <i class="material-icons">announcement</i>
              <p>Notices</p>
            </a>
          </li>

        <li class="nav-item {{ Request::is('disciplinaries') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('disciplinaries')}}">
              <i class="material-icons">accessibility</i>
              <p>Disciplinaries</p>
            </a>
          </li>

        </ul>
      </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="addmealModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-0 border-0 p-4">
            <div class="modal-header border-0">
                <h3>Add Meal</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login">
                    <form action="{{route('add.meals')}}" class="row" method="POST">
                      @csrf
 <!--                        <div class="col-12">
                            <input type="text" class="form-control mb-3" id="name" name="name" placeholder="Name">
                        </div> -->
                        <div class="col-12">
                         <input id="datepickermeal" name="datepicker" width="276"  placeholder="Click me for the date" required="true"/>
                                <script>  
                                      $('#datepickermeal').datepicker({

                                         format: 'yyyy-mm-dd'   
                                         });
                                </script>
                        </div>
                        <div class="col-12">
                                
                            <select class="form-control" name="break_fast" required="true">

                            <option value="1" disabled selected>Choose Breakfast Quantity</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            </select>
                        </div>
                          <div class="col-12">
                            <select class="form-control" name="lunch" required="true">
                            <option value="0" disabled selected>Choose Lunch Quantity</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <select class="form-control" name="dinner" required="true">
                            <option value="" disabled selected>Choose Dinner Quantity</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            </select>
                        </div>


                        <div class="col-12">
                            <button type="submit" class="btn btn-warning">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->