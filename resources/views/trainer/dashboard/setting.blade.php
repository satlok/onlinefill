@extends('layouts.admin')

@section('content')
<script>
 function getcity(){
      var state = $('#st').val().trim().replace(/ /g, '%20');
     // alert(state);
 $.ajax({
                url: 'getcity'+'/'+state,
                type: "get",
                dataType: "html",
                //data: {state:state},
                 success: function(data){ // What to do if we succeed
                  $('#ct').html(data);  
            }
        });
    }
</script>
<script>
 function getadmssion(){
      var state = $('#st').val().trim().replace(/ /g, '%20');
      var city = $('#ct').val().trim().replace(/ /g, '%20');
      var cat = $('#cat').val().trim().replace(/ /g, '%20');
      
 $.ajax({
                url: 'getadmssion'+'/'+state+'/'+city+'/'+cat,
                type: "get",
                dataType: "html",
                //data: {state:state},
                 success: function(data){ // What to do if we succeed
                     console.log(data);
                  $('#admission').html(data);  
            }
        });
    }
</script>
<section class="content-header">
<!--      <h1>
        Advanced Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Advanced Elements</li>
      </ol>-->
    </section>
 <div class="container-fluid">
    <div class="row">
       
       <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('addprofile')}}" method="post">
                {{ csrf_field() }}
               
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Profile Title</label>
                  <input type="text" name="profilename" class="form-control" id="exampleInputEmail1" placeholder="Enter Profile Title" value="@if(isset($profile->profile->profilename)){{$profile->profile->profilename}}@endif">
                </div>
                  
                <div class="form-group">
                  <label for="exampleInputEmail1">Education</label>
                  <input type="text" name="education" class="form-control" id="exampleInputEmail1" placeholder="Enter Education" value="@if(isset($profile->profile->education)){{$profile->profile->education}}@endif">
                </div>
                  
                <div class="form-group">
                  <label for="exampleInputEmail1">Skill</label>
                  <input type="text" name="skill" class="form-control" id="exampleInputEmail1" placeholder="Enter Skill" value="@if(isset($profile->profile->skill)){{$profile->profile->skill}}@endif">
                </div>
                  
                <div class="form-group">
                  <label for="exampleInputEmail1">Phone</label>
                  <input type="text" name="phone" class="form-control" placeholder="Enter Phone" value="@if(isset($profile->profile->phone)){{$profile->profile->phone}}@endif"   data-inputmask='"mask": "999-999-9999"' data-mask>
                </div>
                  
                <div class="form-group">
                  <label for="exampleInputEmail1">D.O.B</label>
                    
                  <input type="text" name="dob" class="form-control pull-right" id="datepicker" placeholder="Enter D.O.B." value="@if(isset($profile->profile->dob)){{$profile->profile->dob}}@endif">
                </div>
                  
                <div class="form-group">
                  <label for="exampleInputEmail1">Address</label>
                  <textarea name="address" class="form-control" id="exampleInputEmail1" placeholder="Enter Address"> @if(isset($profile->profile->address)){{$profile->profile->address}}@endif</textarea>
                </div>

               <div class="form-group">
                  <label for="exampleInputEmail1">Zip/Postal Code</label>
                   <input type="text" name="pin" class="form-control" id="exampleInputEmail1" placeholder="Enter Zip/Postal Code" value="@if(isset($profile->profile->pin)){{$profile->profile->pin}}@endif"  data-inputmask='"mask": "999999"' data-mask>
                </div>

                

                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                   <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
         
          <!-- /.box -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Profile Picture</h3>
            </div>
              <div class="container">
                    <div class="edititem">
                        @if($profile->prpic)
                        <img src="{{ asset('public/img/profilePic/'.$profile->prpic) }}" class="img-thumbnail img-circle" alt="User Image">
                        @else
                        <img src="{{ asset('public/img/default.png') }}" class="img-circle" alt="User Image">
                        @endif
                    </div>
               </div>
            <!-- /.box-header -->
            <!-- form start -->
           @if (count($errors) > 0)

	<div class="alert alert-danger">
		<strong>Whoops!</strong> There were some problems with your input.<br><br>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif


{!! Form::open(array('route' => 'fileUpload','enctype' => 'multipart/form-data')) !!}
	<div class="row cancel">
		<div class="col-md-12 text-center">
			{!! Form::file('image', array('class' => 'image')) !!}
		
			<button type="submit" class="btn btn-success">Create</button>
		</div>
	</div>
{!! Form::close() !!}
          </div>
          <!-- /.box -->
        </div>
        
        
        </div>
</div>


@endsection
