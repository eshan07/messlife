@extends('backend.master')
@section('content')


        @if(session('success'))
         <center> <div class="alert alert-success">
                {{session('success')}}
          </div> </center> 
        @endif    
          @if(session('error'))
         <center> <div class="alert alert-danger">
                {{session('error')}}
          </div> </center> 
        @endif 

<style type="text/css">
* {box-sizing: border-box}


/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 30%;
  height: 300px;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 1px solid #ccc;
  width: 70%;
  border-left: none;
  height: 300px;
}
/*circle*/  
.status {
    font-family: 'Source Sans Pro', sans-serif;
     border-radius: 10%;
     border: 3px solid #FEA600;
}
.status .panel-title {
    font-family: 'Oswald', sans-serif;
    font-size: 45px;
    font-weight: bold;
    color: #FEA600;
    line-height: 25px;
    padding-top: 10px;
    letter-spacing: -0.8px;
}
</style>

<h3>Meal Report: </h3>
<div class="container" >
            
    <div class="row" style="margin-bottom: 15px">
        <div class="col-xs-6 col-md-3">
            
            <div class="panel status panel-danger">
                <div class="panel-heading">
                    <h1 class="panel-title text-center">{{$perday_total}}</h1>
                </div>
                <div class="panel-body text-center">                        
                    <strong>Total Meals</strong>
                </div>
            </div>

        </div> 
        <div class="col-xs-6 col-md-3">
            
            <div class="panel status panel-danger">
                <div class="panel-heading">
                    <h1 class="panel-title text-center">{{$meal_cost->meal_cost}}/=</h1>
                </div>
                <div class="panel-body text-center">                        
                    <strong>Meal Cost</strong>
                </div>
            </div>

        </div> 
        <div class="col-xs-6 col-md-3">
            
            <div class="panel status panel-danger">
                <div class="panel-heading">
                    <h1 class="panel-title text-center">{{$meal_cost->meal_balance}}/=</h1>
                </div>
                <div class="panel-body text-center">                        
                    <strong>Meal Paid</strong>
                </div>
            </div>
                </div> 
        <div class="col-xs-6 col-md-3">
            
            <div class="panel status panel-danger">
                <div class="panel-heading">
                    <h1 class="panel-title text-center">{{$meal_cost->meal_due}}/=</h1>
                </div>
                <div class="panel-body text-center">                        
                    <strong>Meal Due</strong>
                </div>
            </div>
                </div>

</div>


	<table class="table">
	  <thead style="background-color: #ff9800; color: #ffffff;">
	    <tr>
	      <th scope="col"><b>Date</b></th>
	      <th scope="col"><b>Break Fast</b></th>
          <th scope="col"><b>Lunch</b></th>
          <th scope="col"><b>Dinner</b></th>
          <th scope="col"><b>Perday Total</b></th>
	    </tr>
	  </thead>

	  <tbody>
@foreach($meals as $meal)
	    <tr>
	      <td>{{$meal->date}}</td>

	      <td>{{$meal->break_fast}}</td>
        <td>{{$meal->lunch}}</td>
        <td>{{$meal->dinner}}</td>
        <td>{{$meal->perday_meal}}</td>

@endforeach


	    </tr>


	  </tbody>
	</table>
      <a href="{{route('printmealreport')}}" class="btn btn-dark btn-rounded btn-sm"><i class="material-icons lg">print</i></a>

    <!-- Modal -->
<div class="modal fade" id="addbazaarModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-0 border-0 p-4">
            <div class="modal-header border-0">
                <h3>Add Daily Bazaar Cost</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
      <div class="modal-body">
          <div class="login">
            <form action="{{route('bazaarscost')}}" class="row" method="POST">
                      @csrf




            <div class="col-12" style="margin-top: 15px">
                                <input id="datepicker12" name="date" width="276"  placeholder="Click me for the date" required="true"/>
                                <script>  
                                      $('#datepicker12').datepicker({

                                         format: 'yyyy-mm-dd',

                                         });
                                </script>
            </div>
            <div class="col-12">
                <input type="number" class="form-control mb-3" id="amount" name="amount" placeholder="Type amount" min="0">

            </div> 
            <div class="col-12">
                <input type="text" class="form-control mb-3" id="bazar_list" name="bazar_list" placeholder="Type items- separate with com'a(,)">

            </div> 
                                   <div class="col-12">
                            <button type="submit" class="btn btn-danger">Add</button>
                        </div>

            </div>




                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->	


@stop
