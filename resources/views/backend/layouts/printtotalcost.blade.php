<center><h3>All Costs</h3></center>

    <table class="table table-hover  table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead style="background-color: #ff9800; color: #ffffff;">
    <tr>
      <th scope="col"><b>#</b></th>
      <th scope="col"><b>Name</b></th>
      <th scope="col"><b>Room Rent</b></th>
      <th scope="col"><b>Meal Cost</b></th>
      <th scope="col"><b>Meal Due</b></th>
      <th scope="col"><b>Maid Bill</b></th>
      <th scope="col"><b>Internet Bill</b></th>
      <th scope="col"><b>Other Cost</b></th>
      <th scope="col"><b>Total</b></th>
    </tr>
  </thead>

  <tbody>
    @foreach($costs as $key=>$cost)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$cost->user->name}}</td>
      <td>{{$cost->room_rent}}</td>
      <td>{{$cost->mealcost->meal_cost}}</td>
      <td>{{$cost->mealcost->meal_due}}</td>

      <td>{{$cost->maid_cost}}</td>
      <td>{{$cost->net_cost}}</td>
      <td>{{$cost->others_cost}}</td>
      <td>{{$cost->total_cost}}</td>

    </tr>
    @endforeach

  </tbody>
</table>