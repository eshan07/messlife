@extends('backend.master')

@section('content')

<div class="table-responsive">
 <table id="dtBasicExample" class="table table-hover table-striped table-bordered table-sm" cellspacing="0" width="100%">
<tr>
    <th>Name:</th>
    <td>{{Auth()->user()->name}}</td>
  </tr>
  <tr>
    <th>Total Meal</th>
    <td>{{$payments->mealcost->total_meal}}</td>
  </tr>
  <tr>
    <th>Meal Cost</th>
    <td>{{$payments->mealcost->meal_cost}}</td>
  </tr>
  <tr>
    <th>Total Meal Payment</th>
    <td>{{$payments->mealcost->meal_balance}}</td>
  </tr>
  <tr>
    <th>Meal Due</th>
    <td>{{$payments->mealcost->meal_due}}</td>
  </tr>
  <tr>
    <th></th>
    <td></td>
  </tr>
  <tr>
    <th>Room Rent:</th>
    <td>{{$payments->room_rent}}</td>
  </tr>
  <tr>
    <th>Maid Bill:</th>
    <td>{{$payments->maid_cost}}</td>
  </tr>
  <tr>
    <th>Internet Bill:</th>
    <td>{{$payments->net_cost}}</td>
  </tr>
  <tr>
    <th>Other Bills:</th>
    <td>{{$payments->others_cost}}</td>
  </tr>
  <tr>
    <th>House Total Cost:</th>
    <td>{{$payments->total_cost}}</td>
  </tr>
  <tr>
    <th>House Paid Amount</th>
    <td>{{$payments->total_paid}}</td>
  </tr>
  <tr>
    <th>House Cost Dues:</th>
    <td>{{$payments->total_due}}</td>
  </tr>


  </tbody>
</table>
</div>



@stop