@extends('layouts.app')
<script>
 function getcity(){
      var state = $('#st').val().trim().replace(/ /g, '%20');
      //alert(state);
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
@section('content')
<!-- Default form contact -->
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add university / Collage</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form action="{{route('postaddmission')}}" method="post">
                        {{ csrf_field() }}
                <div class="card-body">
                    <div class="col-md-10">
                        <label for="defaultFormContactNameEx" class="grey-text">State</label>
                        <select class="form-control" name="state" id="st" onchange="getcity()">
                            <option no-select>Select State</option>
                            @foreach ($state as $st)
                            <option value="{{$st->state}}">{{$st->state}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-10">
                         <label for="defaultFormContactNameEx" class="grey-text">City</label>
                         <select class="form-control" name="city" id="ct">
                            <option no-select>Select City</option>
                           
                        </select>
                    </div>
                    <div class="col-md-10">
                        <label for="defaultFormContactNameEx" name="catag" class="grey-text">Category</label>
                         <select class="form-control" name="catag" id="ct">
                            <option no-select>Select Category</option>
                            <option value="University">University</option>
                            <option value="College">College</option>
                            <option value="Medical">Medical</option>
                            <option value="Engineering">Engineering</option>
                            <option value="Polytechnic">Polytechnic</option>
                            <option value="ITI">ITI</option>
                        </select>
                    </div>
                    <!-- Default input name -->
                    <label for="defaultFormContactNameEx" class="grey-text">Name</label>
                    <input name="name" type="text" id="defaultFormContactNameEx" required="required" class="form-control">
                    <label for="defaultFormContactNameEx" class="grey-text">Url</label>
                    <input name="url" type="text" id="defaultFormContactNameEx" required="required" class="form-control">
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Next</button>
                </div>
              </form>
            </div>
          

            <!-- /.card -->

          </div>
          <!--/.col (left) -->
       
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>


@endsection
