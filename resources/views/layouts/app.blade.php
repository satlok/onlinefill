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
          <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
          <li  class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ route('privacy') }}">Privacy</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ route('term-services') }}">Term Of Services</a></li>
            @guest
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu dropdown-menu-right">
                                    @if(Auth::user()->role=='Learner')
                                     <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Dashboard</a></li>
                                     @elseif(Auth::user()->role=='Trainer')
                                     <li class="nav-item"><a class="nav-link" href="{{ route('trainer') }}">Dashboard</a></li>
                                     @endif
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
        </ul>
       </div>
  </nav>
  <div class="container-fluid" style="margin-top: 80px;">
        <div class="row">
        <div class="col-sm-12">
        <div class="card">
              <div class="card-body">
                    <a href="{{route('job')}}" class="badge badge-primary">Job</a>
                    <a href="{{route('result')}}" class="badge badge-secondary">Result</a>
                    <a href="{{route('admitCard')}}" class="badge badge-danger">Admit Card</a>
                    <a href="{{route('addmission')}}" class="badge badge-success">Admission</a>
              </div>
        </div>
        </div>
        
    </div>
      <div class="row" style="margin-top: 20px; padding-bottom: 10px;">
          @yield('content')
      </div>
         
     </div>
        <!--Footer-->
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
