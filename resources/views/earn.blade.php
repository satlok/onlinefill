<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Online Fill') }}</title>
     <link href="{{ asset('public/MDB/css/bootstrap.min.css') }}" rel="stylesheet">
     <link href="{{ asset('public/MDB/css/style.css') }}" rel="stylesheet">
     <link href="{{ asset('public/MDB/css/mdb.css') }}" rel="stylesheet">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <!-- Styles -->
    <script src="{{ asset('resources/assets/vendor/jquery/jquery.min.js') }}"></script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-8778607274843108",
          enable_page_level_ads: true
     });
</script>
<style>
    .nav-item{
    text-align: right;
}
</style>
</head>
<body>
      <nav class="navbar fixed-top navbar-expand-lg navbar-dark white scrolling-navbar">
      <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('public/logo.png') }}" width="200" class="no-opacity" alt="Online Fill">
          </a>
     
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
            <a href="#" class="badge badge-primary"><i class="fa fa-list"></i></a>
           </button>
       <!--div class="col-sm-4"></div-->
      <div class="collapse navbar-collapse navbar-right" id="navbarSupportedContent" style="float: right;">
         <ul class="navbar-nav">
        
        </ul>
       </div>
  </nav>
      <div class="container-fluid" style="margin-top: 80px;">
                    <div class="col-md-12" style="margin-bottom: 10px; margin-top: 20px;">
                        <div class="card">
                                 <div class="card-header">
                                    <b class="card-title text-center text-success">Fill Detail</b>
                                    <div class="card-tools"></div>
                                 </div>
                                 <div class="card-body p-0">
                                   <div class="card-body">
            <form action="{{route('postearn')}}" method="post">
                        {{ csrf_field() }}
                  <div class="card-body">
                    <!-- Default input name -->
                    <input name="l_id" type="hidden" required="required" value="{{$id}}" class="form-control">
                    <label for="defaultFormContactNameEx" class="grey-text">Full Name</label>
                    <input name="name" type="text" required="required" class="form-control">

                    <!-- Default input email -->
                    <label for="defaultFormContactEmailEx" class="grey-text">Email-id</label>
                    <input required="required" name="email" type="email" class="form-control">

                    <!-- Default input subject -->
                  
                    
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-sm btn-primary">Send Request</button>
                </div>
              </form>
                                   </div>
                                   <div class="card-footer">
                                   </div>
                                 </div>
                         </div>
                     </div> 
      </div>
    
    <div class="col-sm-12">
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
  <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">

        <!--Call to action-->
        <!--div class="pt-4">
            <a class="btn btn-outline-white" href="{{ route('login') }}" role="button">Log In
                <i class="fa fa-download ml-2"></i>
            </a>
            <a class="btn btn-outline-white" href="{{ route('register') }}" role="button">Sign Up
                <i class="fa fa-graduation-cap ml-2"></i>
            </a>
        </div-->
        <!--/.Call to action-->

        <hr class="my-4">

        <!-- Social icons -->
        <div class="pb-4">
            <a href="{{ route('privacy') }}" target="_blank">
                <!--i class="fa fa-facebook mr-3"></i-->
                Privacy & Policy
            </a>

            
        </div>
        <!-- Social icons -->

        <!--Copyright-->
        <div class="footer-copyright py-3">
            © 2018 Copyright:
            <a href="http://onlinefill.in/" target="_blank"> onlinfill.in </a>
        </div>
        <!--/.Copyright-->

    </footer>
    <!--/.Footer-->
<script src="{{ asset('public/MDB/js/bootstrap.min.js') }}"></script>
 <script src="{{ asset('public/MDB/js/mdb.min.js') }}"></script>
 <script src="{{ asset('public/MDB/js/popper.min.js') }}"></script>
</body>
</html>
