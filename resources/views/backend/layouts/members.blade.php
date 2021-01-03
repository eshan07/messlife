    
    @extends('backend.master')
    
    @section('content')  

 
      
      @if(session('message'))
      <div class="alert alert-success">
              {{session('message')}}
      </div>
    @endif       
      @if(session('message1'))
      <div class="alert alert-success">
              {{session('message1')}}
      </div>
    @endif 

   <div>
      <a href="#" class="btn btn-info" data-toggle="modal" data-target="#signupModal" data-animation-out="fadeOutDown" data-delay-out="2" data-duration-in=".3" data-animation-in="zoomIn" data-delay-in=".7">
        <span style="font-size: 15px;">
        <i class="material-icons">person_add</i>
        Add Member</span>
      </a>
    </div>
  <a href="{{route('printmember')}}">Print</a>
  <div class="table-responsive">       
    <table class="table table-hover  table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead style="background-color: #ff9800; color: #ffffff;">
    <tr>
      <th scope="col"><b>#</b></th>
      <th scope="col"><b>Name</b></th>
      <th scope="col"><b>Email</b></th>
      <th scope="col"><b>Phone Number</b></th>
      <th scope="col"><b>Role</b></th>
      <th scope="col"><b>Action</b></th>
    </tr>
  </thead>

  <tbody>
    @foreach($users as $key=>$user)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->phone}}</td>

      <td>{{$user->role}}</td>
      <td>    
        <div class="row flex-center">
         <a class="btn btn-info btn-rounded btn-sm" style="margin-right: 5px" data-toggle="modal" data-target="#editModal" data-animation-out="fadeOutDown" data-delay-out="2" data-duration-in=".3" data-animation-in="zoomIn" data-delay-in=".7"> <i class="material-icons">edit</i></a><br>
         <a href="{{route('deletemember',$user->id)}}" class="btn btn-danger btn-rounded btn-sm"><i class="material-icons lg">delete_forever</i></a>
         </div>
       </td>

    </tr>
    @endforeach

  </tbody>
</table>
</div>

<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-0 border-0 p-4">
            <div class="modal-header border-0">
                <h3>Add Member</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login">
                    <form action="{{route('add.member')}}" class="row" method="POST" enctype="multipart/form-data">
                      @csrf
                        <div class="col-12">
                            <input type="text" class="form-control mb-3" id="name" name="name" placeholder="Name" required="">
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control mb-3" id="email" name="email" placeholder="Type Email" required="">
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control mb-3" id="phone" name="phone" placeholder="Valid Phone Number" required="">
                        </div>
                        <div class="col-12">
                            <label>Member Image(optional)</label>
                             <input type="file" class="form-control-file" name="image">   
                        </div>
                          <div class="col-12">
                            <input type="text" class="form-control mb-3" id="password" name="password" placeholder="Password" required="">
                        </div>
                        <div class="form-group col-12">
                            <select class="form-control" name="role" required="">

                            <option value="" disabled selected>Choose new user role</option>
                            <option value="Manager">Manager</option>
                            <option value="Member">Member</option>
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
                    <form action="{{route('editmember',$user->id)}}" class="row" method="POST" enctype="multipart/form-data">
                      @csrf
                        <div class="col-12">
                            <input type="text" class="form-control mb-3" id="name" name="name" placeholder="Name"  value="{{$user->name}}">
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control mb-3" id="email" value="{{$user->email}}" name="email" placeholder="Type Email">
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control mb-3" id="phone" name="phone" placeholder="Valid Phone Number" value="{{$user->phone}}">
                        </div>
                        <div class="col-12">
                            <label>Member Image(optional)</label>
                             <input type="file" class="form-control-file" name="image">   
                        </div>

                        <div class="form-group col-12">
                            <select class="form-control" name="role" required="">

                            <option value="" disabled selected>Choose new user role</option>
                            <option value="Manager">Manager</option>
                            <option value="Member">Member</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-warning">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

      @stop