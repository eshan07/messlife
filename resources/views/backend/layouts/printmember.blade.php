<center><h3>All Members List</h3></center>

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

    </tr>
    @endforeach

  </tbody>
</table>