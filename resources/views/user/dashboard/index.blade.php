@extends('layouts.user')

@section('content')
<div class="container-fluid">
    <div class="row">

        
        
    </div>
</div>

 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4><span class="fa fa-folder"></span> Create Folder</h4>
          <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <form role="form" action="{{route('create-folder')}}" method="post">
                {{ csrf_field() }}
                <input type="hidden" class="form-control" value="" name="parrent" placeholder="Enter Folder Name">
                <input type="hidden" class="form-control" value="" name="child" placeholder="Enter Folder Name">
            <div class="form-group">
              <label for="usrname"><span class="fa fa-folder"></span> Folder Name</label>
              <input type="text" class="form-control" name="name" placeholder="Enter Folder Name">
            </div>
            
              <button type="submit" class="btn btn-success btn-block"><span class=""></span> Submit</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span>&times;</span> Cancel</button>
        </div>
      </div>
      
    </div>
  </div> 
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>
@endsection
