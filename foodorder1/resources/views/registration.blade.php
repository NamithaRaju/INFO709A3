@extends('layoutmd')

@section('content')
<div class="container" style="width: 50%">
{{--<form action="{{url('post-registration')}}" method="POST" id="regForm">
    {{ csrf_field() }}
   <div class="form-label-group">
    <label for="inputName">Name</label>

     <input type="text" id="inputName" name="name" class="form-control" placeholder="Full name" autofocus>
     @if ($errors->has('name'))
     <span class="error">{{ $errors->first('name') }}</span>
     @endif       

   </div> 
   <div class="form-label-group">
    <label for="inputEmail">Email address</label>
     <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address">
     @if ($errors->has('email'))
     <span class="error">{{ $errors->first('email') }}</span>
     @endif    
   </div> 

   <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" id="inputAddress" name="address" class="form-control" placeholder="Full address" autofocus>
    @if ($errors->has('address'))
    <span class="error">{{ $errors->first('address') }}</span>
    @endif       

  </div>

  <div class="form-group">
    <label for="inputPhoneno">Phone No</label>
    <input type="text" id="inputPhoneno" name="phoneno" class="form-control" placeholder="Phone No" autofocus>

    @if ($errors->has('phoneno'))
    <span class="error">{{ $errors->first('phoneno') }}</span>
    @endif       

  </div>

   <div class="form-label-group">
    <label for="inputPassword">Password</label>
     <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
     @if ($errors->has('password'))
     <span class="text-danger text-left">{{ $errors->first('password') }}</span>
     @endif  
   </div>

   <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign Up</button>
   <div class="text-center">If you have an account?
     <a class="small" href="{{url('login')}}">Sign In</a></div>
</form>--}}

<!-- Default form register -->
<form class="text-center border border-light p-5" action="{{url('post-registration')}}" method="POST" id="regForm">
      {{ csrf_field() }}
    <p class="h4 mb-4">Sign up</p>
            
    <!-- Full name -->
    <input type="text" id="fullName" name="name" class="form-control mt-4" placeholder="Full name" autocomplete="off" required="">            
    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted">
       @if ($errors->has('name'))
        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
       @endif  
    </small>
    <!-- E-mail -->
    <input type="email" name="email" id="defaultRegisterFormEmail" class="form-control mt-4" placeholder="Email Address" autocomplete="off" required="">
    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted">
       @if ($errors->has('email'))
        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
       @endif  
    </small>

    <!-- Password -->
    <input type="password" name="password" class="form-control mt-4" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" required="">
    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted">
       @if ($errors->has('password'))
        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
       @endif  
    </small>

    <input type="text" id="Address" name="address" class="form-control mt-4" placeholder="Address" autocomplete="off" required="">            
    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted">
       @if ($errors->has('address'))
        <span class="text-danger text-left">{{ $errors->first('address') }}</span>
       @endif  
    </small>

    <!-- Phone number -->
    <input type="number"  name="phoneno" class="form-control mt-4" placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock">

    <!-- Sign up button -->
    <input class="btn btn-info my-4 btn-block orange darken-3" type="submit" value="Sign Up">


    <!-- Terms of service -->
    <p>If you have an account?
        <a href="{{url('login')}}" class="orange-text">Sign In</a>

</form>
<!-- Default form register -->

</div>
 @endsection