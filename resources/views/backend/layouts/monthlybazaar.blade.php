@extends('backend.master')
@section('content')

<div class="table-responsive">
 <table id="dtBasicExample" class="table table-hover table-striped table-bordered table-sm" cellspacing="0" width="100%">
	  <thead style="background-color: #ff9800; color: #ffffff;">
	    <tr>
	      <th scope="col"><b>Bazaar Dates</b></th>
	      <th scope="col"><b>Member</b></th>
	    </tr>
	  </thead>

	  <tbody>
	    @foreach($userDetails as $key=>$bazaar)
	    <tr>
	      <td>{{$bazaar->dates}}</td>
	      <td>{{$bazaar->user->name}}</td>

	    </tr>
	    @endforeach

	  </tbody>
	</table>
</div>

@stop
