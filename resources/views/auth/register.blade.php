@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
         
               
            </div>
        
        
        
        <section class="form-elegant">        
<!-- Card -->
<div class="card">

    <!-- Card body -->
    <div class="card-body mx-4">

        <!-- Material form register -->
        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
            <p class="h4 text-center py-4">Sign up</p>

            <!-- Material input text -->
            <div class="md-form{{ $errors->has('name') ? ' has-error' : '' }}">
                <i class="fa fa-user prefix grey-text"></i>
                <input type="text" id="materialFormCardNameEx" name="name" value="{{ old('name') }}" class="form-control">
                <label for="materialFormCardNameEx" class="font-weight-light">Your name</label>
                 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <p style="color: red">{{ $errors->first('name') }}</p>
                                    </span>
                                @endif
            </div>

            <!-- Material input email -->
            <div class="md-form{{ $errors->has('email') ? ' has-error' : '' }}">
                <i class="fa fa-envelope prefix grey-text"></i>
                <input type="email" id="materialFormCardEmailEx" class="form-control"  name="email" value="{{ old('email') }}">
                <label for="materialFormCardEmailEx" class="font-weight-light">Your email</label>
                 @if ($errors->has('email'))
                                    <span class="help-block">
                                        <p style="color: red">{{ $errors->first('email') }}</p>
                                    </span>
                                @endif
            </div>

         

            <!-- Material input password -->
            <div class="md-form{{ $errors->has('password') ? ' has-error' : '' }}">
                <i class="fa fa-lock prefix grey-text"></i>
                <input type="password" name="password" id="materialFormCardPasswordEx" class="form-control">
                <label for="materialFormCardPasswordEx" class="font-weight-light">Your password</label>
                 @if ($errors->has('password'))
                                    <span class="help-block">
                                        <p style="color: red">{{ $errors->first('password') }}</p>
                                    </span>
                                @endif
            </div>
            
               <!-- Material input email -->
            <div class="md-form">
                <i class="fa fa-lock prefix grey-text"></i>
                <input type="password" name="password_confirmation" id="materialFormCardP" class="form-control">
                <label for="materialFormCardP" class="font-weight-light">Confirm Password</label>
                 
            </div>
               
               
            <div class="md-form{{ $errors->has('role') ? ' has-error' : '' }}">
                
                <select name="role" class="form-control" id="materialFormCardI">
                    <option selected="selected" value="" class="font-weight-light">---I Am----</option>
                    <option value="Learner">Learner</option>
                    <option value="Trainer">Trainer</option>
                </select>
                @if ($errors->has('role'))
                                    <span class="help-block">
                                        <p style="color: red">{{ $errors->first('role') }}</p>
                                    </span>
                                @endif
                 
            </div>

            <div class="text-center py-4 mt-3">
                <button class="btn btn-cyan" type="submit">Register</button>
            </div>
        </form>
        <!-- Material form register -->

    </div>
    <!-- Card body -->

</div>
<!-- Card -->
         </section>             
    </div>
</div>
@endsection
