<center><h3>Bazaar Schedule</h3></center>

    <table class="table table-hover  table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead style="background-color: #ff9800; color: #ffffff;">
    <tr>
      <th scope="col"><b>#</b></th>
      <th scope="col"><b>Date</b></th>
      <th scope="col"><b>Name</b></th>
    </tr>
  </thead>

  <tbody>
    @foreach($bazaars as $key=>$bazaar)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$bazaar->dates}}</td>
      <td>{{$bazaar->user->name}}</td>


    </tr>
    @endforeach

  </tbody>
</table>