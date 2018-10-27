@extends('layouts.app')
<style>
    
.form-elegant .font-small {
  font-size: 0.8rem; }

.form-elegant .z-depth-1a {
  -webkit-box-shadow: 0 2px 5px 0 rgba(55, 161, 255, 0.26), 0 4px 12px 0 rgba(121, 155, 254, 0.25);
  box-shadow: 0 2px 5px 0 rgba(55, 161, 255, 0.26), 0 4px 12px 0 rgba(121, 155, 254, 0.25); }

.form-elegant .z-depth-1-half,
.form-elegant .btn:hover {
  -webkit-box-shadow: 0 5px 11px 0 rgba(85, 182, 255, 0.28), 0 4px 15px 0 rgba(36, 133, 255, 0.15);
  box-shadow: 0 5px 11px 0 rgba(85, 182, 255, 0.28), 0 4px 15px 0 rgba(36, 133, 255, 0.15); }
                
</style>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
           
        </div>
        
        
        
        
<section class="form-elegant">

    <!--Form without header-->
    <div class="card">

        <div class="card-body mx-4">

            <!--Header-->
            <div class="text-center">
                <h3 class="dark-grey-text mb-5"><strong>Sign in</strong></h3>
            </div>

            <!--Body-->
             <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
            <div class="md-form{{ $errors->has('email') ? ' has-error' : '' }}">
               
                <input type="text" name="email" value="{{ old('email') }}" id="Form-email1" class="form-control">
                <label for="Form-email1">Your email</label>
                 @if ($errors->has('email'))
                                    <span class="help-block">
                                        <p class="red">{{ $errors->first('email') }}</p>
                                    </span>
                                @endif
            </div>

            <div class="md-form pb-3{{ $errors->has('password') ? ' has-error' : '' }}">
               
                <input type="password"  name="password" id="Form-pass1" class="form-control">
                <label for="Form-pass1">Your password</label>
                 @if ($errors->has('password'))
                                    <span class="help-block">
                                        <p class="red">{{ $errors->first('password') }}</p>
                                    </span>
                                @endif
                <p class="font-small blue-text d-flex justify-content-end">Forgot <a href="{{ route('password.request') }}" class="blue-text ml-1"> Password?</a></p>
            </div>
                        
            <div class="text-center mb-3">
                <button type="submit" class="btn blue-gradient btn-info btn-rounded z-depth-1a">Sign in</button>
            </div>
              </form>           
            <p class="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-2"> or Sign in with:</p>

                <div class="row my-3 d-flex justify-content-center">
                    <!--Facebook-->
                    <button type="button" class="btn btn-white btn-rounded mr-md-3 z-depth-1a"><i class="fa fa-facebook blue-text text-center"></i></button>
                    <!--Twitter-->
                    <button type="button" class="btn btn-white btn-rounded mr-md-3 z-depth-1a"><i class="fa fa-twitter blue-text"></i></button>
                    <!--Google +-->
                    <button type="button" class="btn btn-white btn-rounded z-depth-1a"><i class="fa fa-google-plus blue-text"></i></button>
                </div>

        </div>

        <!--Footer-->
        <div class="modal-footer mx-5 pt-3 mb-1">
            <p class="font-small grey-text d-flex justify-content-end">Not a member? <a href="{{ route('register') }}" class="blue-text ml-1"> Sign Up</a></p>
        </div>

    </div>
    <!--/Form without header-->

</section>
            
        
        
    </div>
</div>
@endsection
