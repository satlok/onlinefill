@extends('layouts.admin')

@section('content')
<script type="text/javascript">
		$(function() {
			 $('#example_emailBS').multiple_emails({position: "bottom"});
			//OR $('#example_emailBS').multiple_emails("Bootstrap");
		});
	</script>
    <!-- Content Header (Page header) -->
   	<div class="row">
		    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title text-capitalize">{{$file->title}}</h3><br>
          <span>Created at: {{$file->created_at}}</span>   
          <div class="box-tools pull-right">
              <button type="button" class="btn btn-sm btn-warning"  data-toggle="modal" data-target="#modal-info">
              <i class="fa fa-envelope"></i>  Share by mail</button>
              

          </div>
        </div>
        <div class="box-body">
            <section class="content">
                @if($file->img==NULL)
                <p class="text text-justify">{{$file->matter}}</p>
                @else
                <img src="{{ asset('public/img/dir/'.$file->img) }}" class="img img-responsive" >
                @endif
            </section>
            
        </div>
        <!-- /.box-body -->

        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
	</div>

 <div class="modal modal-default fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Enter mail id</h4>
              </div>
                <form role="form"  method="post" action="{{route('create-amail')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="material_id" value="{{$file->id}}">
              <div class="modal-body">
               
                  
                    <div class="box-body">
                     <div class='container'>
		     <div class='row'>
			<div class='form-group'>
				<div class='col-sm-4'>
					<h4 for='example_emailBS'>Input email addresses</h4>
					<input type='text' id='example_emailBS' name='email' class='form-control' value=''>
				</div>
			</div>
		     </div>
	             </div>
                     
                     
                    </div>
                    <!-- /.box-body -->

          
                   
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-default">Send</button>
              </div>
                 </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        
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
