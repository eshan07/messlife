@extends('backend.master')
@section('content')


          @if(Auth()->user()->role=='Manager')
    <div>
      <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#signupModal" data-animation-out="fadeOutDown" data-delay-out="2" data-duration-in=".3" data-animation-in="zoomIn" data-delay-in=".7">
        <span style="font-size: 15px;">
        <i class="material-icons">note_add</i>
        Add Notice</span>
      </a>
    </div>
    @endif
         
<div class="table-responsive">
 <table id="dtBasicExample" class="table table-hover table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead style="background-color: #ff9800; color: #ffffff;">
    <tr>
      <th scope="col"><b>#</b></th>
      <th scope="col"><b>Notice</b></th>
      <th scope="col"><b>Date</b></th>
      
      <th scope="col"><b>Action</b></th>

    </tr>
  </thead>

  <tbody>

    @foreach($notices as $key=>$notice)
    <tr>

      <th scope="row">{{$key+1}}</th>
      <td>{{$notice->notice}}</td>
      <td>{{$notice->created_at}}</td>

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
                <h3>Add Notice</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login">
                    <form action="{{route('add.notice')}}" class="row" method="POST">
                      @csrf
                        <div class="col-12">
                            <input type="text" class="form-control mb-3" id="name" name="notice" placeholder="Type Here>>">
                        </div>
                        
                        <div class="col-12">
                            <button type="submit" class="btn btn-warning">Done</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

@stop