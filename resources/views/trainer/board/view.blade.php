@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
   	<div class="row">
		    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title text-capitalize">{{$board->title}}</h3>
              
          <div class="box-tools pull-right">
              <button type="button" class="btn btn-sm btn-info"  data-toggle="modal" data-target="#modal-info">
              Create Directory</button>
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
          
            @if(!empty($board))
           
            <div class="col-md-9">
                <div class="box box-primary">
                    @foreach($board->directory as $dir)
                    
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="info-box">
                        <span class="info-box-icon"><i class="fa fa-folder-open" style="color: {{$dir->color}}; "></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text"><a href="{{route('view-adir',['id'=>base64_encode($dir->id)])}}">{{$dir->dir}}</a></span>
                          <span class="info-box-number">41,410</span>

                         
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      </div>
                    
                      <!-- /.col -->
                    
                    @endforeach
                </div>
            </div>
            @endif
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
              <img class="profile-user-img img-responsive img-circle" src="{{ asset('public/img/board/'.$board->pic) }}" alt="{{$board->title}}" >

              <h3 class="profile-username text-center"><a href="{{route('view-aboard',["id"=>$board->id])}}">{{$board->title}}</a></h3>


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
            
            
            
        </div>
        <!-- /.box-body -->

        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
	</div>

     <div class="modal modal-info fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Create Board</h4>
              </div>
                <form role="form"  method="post" action="{{route('create-adir')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="board_id" value="{{$board->id}}">
              <div class="modal-body">
               
                  
                    <div class="box-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Directory Name</label>
                        <input type="text" class="form-control" name="dir" id="exampleInputEmail1" placeholder="Enter Directory Name">
                      </div>
                     
                     <div class="form-group">
                        <label for="exampleInputEmail1">Color</label>
                        <input type="color" class="form-control" name="color" id="exampleInputEmail1" placeholder="Enter color">
                      </div>
                    </div>
                    <!-- /.box-body -->

          
                   
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-outline">Save</button>
              </div>
                 </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        
         
@endsection
