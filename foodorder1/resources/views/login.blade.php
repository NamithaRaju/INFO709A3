@extends('layoutmd')

@section('content')

<div class="container">
  <div class="col-lg-12 d-flex justify-content-center">
    <form class="text-center border border-light p-5" action="{{url('post-login')}}" method="POST" id="logForm">

        <p class="h2 mb-4">Sign in</p>
        {{ csrf_field() }}
        <input type="email" name="email"  class="form-control mb-4" placeholder="Email address">
         @if ($errors->has('email'))
         <span class="error">{{ $errors->first('email') }}</span>
         @endif 
        <!-- Password -->
        <input type="password" name="password" class="form-control mb-4" placeholder="Password">
         @if ($errors->has('password'))
         <span class="error">{{ $errors->first('password') }}</span>
         @endif 
        
        {{--<div class="d-flex justify-content-around">
            <div>
                <!-- Remember me -->
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                    <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
                </div>
            </div>
            <div>
                <!-- Forgot password -->
                <a href="">Forgot password?</a>
            </div>
        </div>--}}

        <!-- Sign in button -->
        <input class="btn btn-info btn-block my-4  orange darken-3 " type="submit" value="Sign in">

        <!-- Register -->
        <p>Not a member?
            <a href="{{url('registration')}}" class="deep-orange-text">Register</a>
        </p>

        {{--<p>or sign in with:</p>

        <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f light-blue-text"></i></a>
        <a href="#" class="mx-2" role="button"><i class="fab fa-twitter light-blue-text"></i></a>
        <a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in light-blue-text"></i></a>
        <a href="#" class="mx-2" role="button"><i class="fab fa-github light-blue-text"></i></a>--}}
    </form>
  </div>
</div>
 @endsection