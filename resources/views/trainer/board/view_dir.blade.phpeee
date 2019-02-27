@extends('layouts.admin')
<link rel="stylesheet" href="{{ asset('public/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
@section('content')

    <!-- Content Header (Page header) -->
   	<div class="row">
		    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title text-capitalize">{{$dir->dir}}</h3>
              
          <div class="box-tools pull-right">
              <button type="button" class="btn btn-sm btn-info"  data-toggle="modal" data-target="#modal-capture">
              Capture Image</button>
              <button type="button" class="btn btn-sm btn-info"  data-toggle="modal" data-target="#modal-note">
              Create Note</button>
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse"></button>
                <button type="button" class="btn btn-sm btn-info"  data-toggle="modal" data-target="#modal-info">
              Create Directory</button>
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>

          </div>
        </div>
        <div class="box-body">
          
            @if(!empty($subDir))
           
             <div class="col-md-12">
                <div class="box box-primary">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            <i class="fa fa-folder-open-o"></i> Directory
                            <small class="pull-right"></small>
                          </h2>
                     <section class="container-fluid">
                    @foreach($subDir as $dirs)
                    
                    <div class="col-md-1">
                        <i class="fa fa-folder-open" style="color: {{$dirs->color}}; font-size:55pt; "></i>
                          <a href="{{route('view-adir',['id'=>base64_encode($dirs->id)])}}">{{$dirs->dir}}</a>
                      </div>
                    
                      <!-- /.col -->
                    
                    @endforeach
                     </section>
                    </div>
               
                 
                 
                 <div class="col-md-12">
                      <h2 class="page-header">
                            <i class="fa fa-file-text-o"></i> File
                            <small class="pull-right"></small>
                          </h2>
                     <section class="container-fluid" style="margin-top: 20pt;">
                 @foreach($dir->material as $mat)
                    
                    <div class="col-md-1">
                        @if($mat->img==NULL)
                        
                        <i class="fa fa-file-text-o" style=" font-size:55pt;"></i>
                       <a href="{{route('view-adir',['id'=>base64_encode($mat->id)])}}">{{$mat->title}}
                        </a>
                         @else
                        <a href="{{route('view-adir',['id'=>base64_encode($mat->id)])}}"><img src="{{ asset('public/img/dir/'.$mat->img) }}" height="90" ></a>{{$mat->title}}
                        @endif
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.col -->
                    @endforeach
                  </section>

                </div>
            </div>
            
            
<!--            -->
            
             </div>
            @endif
        </div>
        <!-- /.box-body -->

        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
	</div>

     <div class="modal modal-info fade" id="modal-note">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Create Note</h4>
              </div>
                <form role="form"  method="post" action="{{route('create-amatter')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
              <div class="modal-body">
               <input type="hidden" name="directory_id" value="{{$dir->id}}">
                  
                    <div class="box-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="Enter Directory Name">
                      </div>
                     
                     <div class="form-group">
                        <label for="exampleInputEmail1">Note</label>
                        <textarea id="editor1" name="matter" rows="10" cols="80">
                                            
                        </textarea>
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
        
            <div class="modal modal-info fade" id="modal-capture">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Capture Image</h4>
              </div>
                <form role="form"  method="post" action="{{route('create-amatter')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
              <div class="modal-body">
               <input type="hidden" name="directory_id" value="{{$dir->id}}">
                  
                    <div class="box-body">
                         <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="Enter Directory Name">
                      </div>
                      <div class="form-group">
                        <input type="file" class="btn btn-sm btn-info" capture="environment" accept="image/*" id="cameraInput" name="file" style="float: left; margin-right: 5px;">
                      </div>
                     
                      <img id="blah" src="#" alt="Capture pic" width='200' />                     
                      <script>                     
                          function readURL(input) {     
                              if (input.files && input.files[0]) {         
                                  var reader = new FileReader();          
                                  reader.onload = function (e) {             
                                      $('#blah').attr('src', e.target.result);         
                                  }          
                                  reader.readAsDataURL(input.files[0]);     
                              } }  
                          $("#cameraInput").change(function(){     
                              readURL(this); });                     
                      </script>
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
                    <input type="hidden" name="board_id" value="{{$dir->board_id}}">
                    <input type="hidden" name="parent_id" value="{{$dir->id}}">
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
        <!-- /.modal -->
        <script src="{{ asset('public/admin/bower_components/ckeditor/ckeditor.js')}}"></script>
        <script src="{{ asset('public/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
@endsection
