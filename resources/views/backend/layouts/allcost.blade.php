@extends('backend.master')

@section('content')
<style>
* {box-sizing: border-box}


/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 30%;
  height: 420px;
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
  height: 420px;
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

      
      @if(session('message'))
      <div class="alert alert-success">
              {{session('message')}}
      </div>
    @endif 
      
      @if(session('message1'))
      <div class="alert alert-danger">
              {{session('message1')}}
      </div>
    @endif 

   <div>
      <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#costModal" data-animation-out="fadeOutDown" data-delay-out="2" data-duration-in=".3" data-animation-in="zoomIn" data-delay-in=".7">
        <span style="font-size: 15px;">
        <i class="material-icons">add</i>
        Add Costs</span>
      </a>
      <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#paymentModal" data-animation-out="fadeOutDown" data-delay-out="2" data-duration-in=".3" data-animation-in="zoomIn" data-delay-in=".7">
        <span style="font-size: 15px;">
        <i class="material-icons">add</i>
        Payment</span>
      </a>
      <a href="{{route('printcost')}}" class="btn btn-dark btn-rounded btn-sm"><i class="material-icons lg">print</i></a>
    </div>


<h3>Individual Costs: </h3>
<div class="tab">
  @foreach($costs as $cost)
  <button class="tablinks" onclick="openCity(event, '{{$cost->user->name}}')" id="defaultOpen">{{$cost->user->name}}</button>
  @endforeach

</div>
@foreach($costs as $cost)
<div id="{{$cost->user->name}}" class="tabcontent" style="background: #2E2E2E">

  <table class="table table-dark responsive" style="background: #2E2E2E; margin-top: 3.5%;">
  <tr>
    <th>Room Rent</th>
    <td>{{$cost->room_rent}}</td>
  </tr>

  <tr>
    <th>Maid Bill</th>
    <td>{{$cost->maid_cost}}</td>
  </tr> 
  <tr>
    <th>Internet Bill</th>
    <td>{{$cost->net_cost}}</td>
  </tr> 
  <tr>
    <th>Other Cost</th>
    <td>{{$cost->others_cost}}</td>
  </tr> 
   <tr>
    <th>Total</th>
    <td> {{$cost->total_cost}}</td>
  </tr>
        <tr>
    <th>Total Paid</th>
    <td>{{$cost->total_paid}}</td>
  </tr> 
        <tr>
    <th><h3>Total Due</h3></th>
    <td><h3>{{$cost->total_due}}
                <a href="{{route('deletetotalcost',$cost->id)}}" class="btn btn-danger btn-rounded btn-sm" style="margin-left: 60%"><i class="material-icons lg">delete_forever</i></a></h3></td>
  </tr> 

  </tbody>
</table>
  
</div>
@endforeach

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>


<div class="modal fade" id="costModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-0 border-0 p-4">
            <div class="modal-header border-0">
                <h3>Add Additional Cost</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login">
                    <form action="{{route('addcosts')}}" class="row" method="POST">
                      @csrf
                          <div class="col-12">
                            <label style="color: black">Select User: </label>
                            <select class="form-control" name="member_id" required="true">
              @foreach($allMembers as $member)
                            <option value="{{$member->id}}">{{$member->name}}</option>
                            @endforeach
                            </select>
                        </div> 

                        <div class="col-12">
                            <input type="number" class="form-control mb-3" id="name" name="room_rent" placeholder="Type Room Rent" min="0">
                        </div>
                        <div class="col-12">
                            <input type="number" class="form-control mb-3" id="name" name="maid" placeholder="Type Maid Bill" min="0">
                        </div>
                        <div class="col-12">
                            <input type="number" class="form-control mb-3" id="name" name="internet_bill" placeholder="Type Internet Bill" min="0">
                        </div>
                        <div class="col-12">
                            <input type="number" class="form-control mb-3" id="name" name="other_cost" placeholder="Type Other Cost" min="0">
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
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-0 border-0 p-4">
            <div class="modal-header border-0">
                <h3>Add Payment</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login">
                    <form action="{{route('addpayment')}}" class="row" method="POST">
                      @csrf
                          <div class="col-12">
                            <label style="color: black">Select User: </label>
                            <select class="form-control" name="member_id" required="true">
              @foreach($allMembers as $member)
                            <option value="{{$member->id}}">{{$member->name}}</option>
                            @endforeach
                            </select>
                        </div> 

                        <div class="col-12">
                            <input type="number" class="form-control mb-3" id="name" name="paid" placeholder="Type amount" min="0">
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

@stop