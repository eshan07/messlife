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

@if(Auth()->user()->role=='Manager')
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div>
                      <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#addbazaarModal" data-animation-out="fadeOutDown" data-delay-out="2" data-duration-in=".3" data-animation-in="zoomIn" data-delay-in=".7">
                        <span style="font-size: 15px;">
                        <i class="material-icons">attach_money</i>
                        Add Bazaar Cost</span>
                      </a>
                      <div>
                          <h5 style="margin-left: 5%"> <strong>Total Bazaar Cost=    {{$totalBazaar}} ‎BDT</strong></h5>
                      </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <form class="form" action="{{route('monthlyBazaarCost')}}" method="get">
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
                                    <option value="12">December</option>
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
@endif


	<table class="table">
	  <thead style="background-color: #ff9800; color: #ffffff;">
	    <tr>
	      <th scope="col"><b>Bazaar Dates</b></th>
	      <th scope="col"><b>Member</b></th>
          <th scope="col"><b>Cost</b></th>
          <th scope="col"><b>Bazaar Items</b></th>
	    </tr>
	  </thead>

	  <tbody>
	    @foreach($userDetails as $key=>$bazaar)
	    <tr>
	      <td>{{$bazaar->dates}}</td>
	      <td>{{$bazaar->user->name}}</td>
          <td>{{$bazaar->bazar_cost}}</td>
          <td>{{$bazaar->bazar_list}}</td>
	      <td> </td>



	    </tr>
	    @endforeach

	  </tbody>
	</table>


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
