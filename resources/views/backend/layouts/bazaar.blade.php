@extends('backend.master')
@section('content')

<div class="table-responsive">
 <table id="dtBasicExample" class="table table-hover table-striped table-bordered table-sm" cellspacing="0" width="100%">
	  <thead style="background-color: #ff9800; color: #ffffff;">
	    <tr>
	      <th scope="col"><b>Bazaar Dates For {{Auth::user()->name}}</b></th>


	    </tr>
	  </thead>

	  <tbody>

	    @foreach($dates as $key=>$date)
	    <tr>
	      <td>{{$date->dates}}</td>




	    </tr>
	    @endforeach

	  </tbody>
	</table>
</div>	


@stop