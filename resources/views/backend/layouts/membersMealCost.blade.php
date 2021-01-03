    
    @extends('backend.master')
    
    @section('content')  

 
      
      @if(session('success'))
      <div class="alert alert-success">
              {{session('success')}}
      </div>
    @endif 

       <div>
      <a href="#" class="btn btn-info" data-toggle="modal" data-target="#mealCostModal" data-animation-out="fadeOutDown" data-delay-out="2" data-duration-in=".3" data-animation-in="zoomIn" data-delay-in=".7">
        <span style="font-size: 15px;">
        <i class="material-icons">add</i>
        Add Meal Balance</span>
      </a>
    </div>

         
<div class="table-responsive">
 <table id="dtBasicExample" class="table table-hover table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead style="background-color: #ff9800; color: #ffffff;">
    <tr>
      <th scope="col"><b>#</b></th>
      <th scope="col"><b>Name</b></th>
      <th scope="col"><b>Total Meal</b></th>
      <th scope="col"><b>Meal Cost</b></th>
      <th scope="col"><b>Meal Balance</b></th>
      <th scope="col"><b>Meal Dues</b></th>
      <th scope="col"><b>Action</b></th>
    </tr>
  </thead>

  <tbody>
    @foreach($allmealcost as $key=>$mealcost)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$mealcost->user->name}}</td>
      <td>{{$mealcost->total_meal}}</td>
      <td>{{$mealcost->meal_cost}} /=</td>
      <td>{{$mealcost->meal_balance}} /=</td>
      <td>{{$mealcost->meal_due}} /=</td>
      <td>
        <div class="row flex-center">
         <a class="btn btn-info btn-rounded btn-sm" style="margin-right: 5px" data-toggle="modal" data-target="#editModal" data-animation-out="fadeOutDown" data-delay-out="2" data-duration-in=".3" data-animation-in="zoomIn" data-delay-in=".7"> <i class="material-icons">edit</i></a>
         </div>
      </td>


    </tr>
    @endforeach

  </tbody>
</table>
</div>

<!-- Modal -->
<div class="modal fade" id="mealCostModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-0 border-0 p-4">
            <div class="modal-header border-0">
                <h3>Add Meal Balance</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login">
                    <form action="{{route('mealcostadd')}}" class="row" method="POST">
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
                            <input type="number" class="form-control mb-3" id="name" name="balance" placeholder="Type Amount" min="0">
                        </div>


                        <div class="col-12">
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-0 border-0 p-4">
            <div class="modal-header border-0">
                <h3>Edit Member Information</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login">
                    <form action="{{route('editmealbalance',$mealcost->id)}}" method="POST">
                      @csrf
                        <div class="col-12">
                            <input type="text" class="form-control mb-3" id="name" name="balance" placeholder="Balance"  value="{{$mealcost->meal_balance}}">
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

      @stop