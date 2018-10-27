@extends('layouts.user')

@section('content')

    <!-- Content Header (Page header) -->
   	<div class="row">
		    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Board List</h3>
              
          <div class="box-tools pull-right">
              <button type="button" class="btn btn-sm btn-info"  data-toggle="modal" data-target="#modal-default">
             <i class="fa fa-clipboard"></i>  Add New Board</button>
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
              
          </div>
        </div>
        <div class="box-body">
            @if(isset($success))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
               {{$success}}
              </div>
            @endif
          
            @if(!empty($boards))
            @foreach($boards as $board)
            
            <div class="col-md-3" style="height: 400px;">
            <div class="box box-primary">
                 <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool"  data-toggle="modal" data-target="#modal-info">
                         <i class="fa fa-pencil"></i></button>
                      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                              title="Collapse">
                        <i class="fa fa-trash"></i></button>

                    </div>
            <div class="box-body box-profile">
                @if($board->pic)
              <img class="profile-user-img img-responsive img-circle" src="{{ asset('public/img/board/'.$board->pic) }}" alt="{{$board->title}}" >
              @else
              <img class="profile-user-img img-responsive img-circle" src="{{ asset('public/img/default.png') }}" alt="{{$board->title}}" >
              @endif
              <h3 class="profile-username text-center"><a href="{{route('view-uboard',["id"=>$board->id])}}">{{$board->title}}</a></h3>


              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>
            @endforeach
            
            @endif
            
        </div>
        <!-- /.box-body -->
 {{ $boards->links() }}
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
	</div>

     <div class="modal modal-default fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Create Board</h4>
              </div>
                <form role="form"  method="post" action="{{route('create-uboard')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
              <div class="modal-body">
               
                  
                    <div class="box-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="Enter title">
                      </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea class="form-control" name="description"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="cameraInput" name="file">

                      </div>
                     
                    </div>
                    <!-- /.box-body -->

                    <img id="blah" src="#" width='200' style="display: none;" />
                   
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-default">Save</button>
              </div>
                 </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        
         <script>                     
             function readURL(input) {     
                 if (input.files && input.files[0]) {         
                     var reader = new FileReader();          
                    reader.onload = function (e) {  
                        
                        $('#blah').attr('src', e.target.result); 
                        $('#blah').css('display','block')
                    }          
                   reader.readAsDataURL(input.files[0]);     
               } }  
           $("#cameraInput").change(function(){ 
               readURL(this); 
           });                    
         </script>
@endsection
