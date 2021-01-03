@extends('backend.master')

@section('content')
    @if(session('success'))
      <div class="alert alert-success">
              {{session('success')}}
      </div>
    @endif 
    @if(session('error'))
      <div class="alert alert-danger">
              {{session('error')}}
      </div>
    @endif 

          <div class="container">
            <div class="row">
                <div class="col-md-4">
                  <div>
              <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#addmealModal" data-animation-out="fadeOutDown" data-delay-out="2" data-duration-in=".3" data-animation-in="zoomIn" data-delay-in=".7">
                <span style="font-size: 15px;">
                <i class="material-icons">add</i>
                Add Meal</span>
              </a>
            </div>
                </div>
                <div class="col-md-6">
                    <form class="form" action="{{route('mealsMonthly')}}" method="get">
                        @csrf
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon" id="month-addon">Month: </span>
                                <select name="month" class="form-control" aria-describedby="month-addon" >
                                    <option value="1">January</option>                            
                                    <option value="2">February</option>            
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">Octomber</option>
                                    <option value="11">November</option>
                                    <option value="12" selected="selected">December</option>
                                </select>
                                <span class="input-group-addon" id="year-addon">Year: </span>
                                <select class="form-control" name="year" aria-describedby="year-addon">
                                    <option value="2019">2019</option>                          
                                    <option  value="2020">2020</option>                          
                                </select>
                               <div class="col-md-2">
                  <button type="submit" class="btn btn-danger">View</button>
                            </div>

                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
<div class="table-responsive">
 <table id="dtBasicExample" class="table table-hover table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead style="background-color: #ff9800; color: #ffffff;">
    <tr>
      <th scope="col"><b>Date</b></th>
      <th scope="col"><b>Breakfast</b></th>
      <th scope="col"><b>Lunch</b></th>
      <th scope="col"><b>Dinner</b></th>
      <th scope="col"><b>Perday Total</b></th>
    </tr>
  </thead>

  <tbody>
    @foreach($meals as $key=>$meal)
    <tr>
      <td>{{$meal->date}}</td>
      <td>{{$meal->break_fast}}</td>
      <td>{{$meal->lunch}}</td>
      <td>{{$meal->dinner}}</td>
      <td>{{$meal->perday_meal}}</td>


    </tr>
    @endforeach

  </tbody>
</table>
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
                       <div class="col-12" style="margin-top: 15px">
                                <input id="datepickermeal" name="datepicker" width="276"  placeholder="Click me for the date" required="true"/>
                                <script>  
                                      $('#datepickermeal').datepicker({

                                         format: 'yyyy-mm-dd'   
                                         });
                                </script>


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
    </div>

<!-- Modal -->

@stop