@extends('layouts.app')
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
@section('content')

  <div class="col-sm-10">
     
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>

                <div class="card-tools">
                
                      <div class="col-sm-3" style="float: left;">
                        <select class="form-control" name="state" id="st" onchange="getcity()">
                            <option no-select>Select State</option>
                            @foreach ($state as $st)
                            <option value="{{$st->state}}">{{$st->state}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3" style="float: left;">
                         <select class="form-control" name="city" id="ct">
                            <option no-select>Select City</option>
                           
                        </select>
                    </div>
                    <div class="col-sm-3" style="float: left;">
                         <select class="form-control" name="catag" id="cat">
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
                    <button class="btn btn-sm btn-primary" onclick="getadmssion()">Search</button>
                    
                   
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                      
                  <div class="card-body" id="admission">
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                 
                </div>
             
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>

<div class="col-sm-2">
    <div class="card">
      <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- onlinefill -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-8778607274843108"
     data-ad-slot="4138118427"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
    </div>
       
</div>

@endsection
 