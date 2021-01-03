@extends('backend.master')
@section('content')



	    @if(session('success'))
	     <center> <div class="alert alert-success">
	            {{session('success')}}
	      </div> </center> 
	    @endif 	  
	      @if(session('duplicate'))
	     <center> <div class="alert alert-danger">
	            {{session('duplicate')}}
	      </div> </center> 
	    @endif 




	    <div class="container">
            <div class="row">
                <div class="col-md-4">
                	<div>
				      <a href="#" class="btn btn-info" data-toggle="modal" data-target="#addbazaarModal" data-animation-out="fadeOutDown" data-delay-out="2" data-duration-in=".3" data-animation-in="zoomIn" data-delay-in=".7">
				        <span style="font-size: 15px;">
				        <i class="material-icons">person_add</i>
				        Add Bazaar Schedule</span>
				      </a>
			    	</div>
                </div>
                <div class="col-md-6">
                    <form class="form" action="{{route('monthlyview')}}" method="get">
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
                  <button type="submit" class="btn btn-success">View</button>
                            </div>
                               <div class="col-md-2">

                            </div>
                               <div class="col-md-2" style="margin-left: 6%; margin-top: 3%">
                           <a href="{{route('printschedule')}}" class="btn btn-dark btn-rounded btn-sm"><i class="material-icons lg">print</i></a>
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
	      <th scope="col"><b>Bazaar Dates</b></th>
	      <th scope="col"><b>Member</b></th>
	      <th scope="col"><b>Action</b></th>
	    </tr>
	  </thead>

	  <tbody>
	    @foreach($userDetails as $key=>$bazaar)
	    <tr>
	      <td>{{$bazaar->dates}}</td>
	      <td>{{$bazaar->user->name}}</td>
	      <td> 
             <div class="row flex-center">
             <a href="{{route('deletebazaar',$bazaar->id)}}" class="btn btn-danger btn-rounded btn-sm"><i class="material-icons lg">delete_forever</i></a>
             </div>
          </td>



	    </tr>
	    @endforeach

	  </tbody>
	</table>
</div>

    <!-- Modal -->
<div class="modal fade" id="addbazaarModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-0 border-0 p-4">
            <div class="modal-header border-0">
                <h3>Add Bazaar Schedule</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
      <div class="modal-body">
          <div class="login">
            <form action="{{route('add.bazaars')}}" class="row" method="POST">
                      @csrf

                        <div class="col-12">
                            <label style="color: black">Select User: </label>
                            <select class="form-control" name="member_name" required="true">
    					@foreach($allMembers as $member)
                            <option value="{{$member->id}}">{{$member->name}}</option>
                            @endforeach
                            </select>
                        </div> 


            <div class="col-12" style="margin-top: 15px">
             <label style="color: black">Choose bazaar date range:      </label>
			 <input type="text" name="daterange"/>     
			   <!-- Linked files in master blade (bazaar datepicker) -->
                <div class="col-12">
                   <button type="submit" class="btn btn-warning">Add</button>
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
