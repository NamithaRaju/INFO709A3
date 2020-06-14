@extends('layoutmd')

@section('content')
<div class="container" style="width: 50%">
   @if(session('success'))
                <div class="alert alert-success">
                    <strong>Great!</strong> {{session('success')}}
                </div>
            @endif


<!-- Default form register -->
<form class="text-center border border-light p-5" action="{{url('insertcontact')}}" method="POST" id="regForm">
      {{ csrf_field() }}
    <p class="h4 mb-4">Contact us</p>
            
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

    <!-- Phone number -->
    <input type="number"  name="phone" class="form-control mt-4" placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock">

    <!-- Message -->
    <textarea rows="9" name="message" class="form-control mt-4" placeholder="Message" aria-describedby="defaultRegisterFormPhoneHelpBlock"></textarea>


    <!-- Sign up button -->
    <input class="btn btn-info my-4 btn-block orange darken-3" type="submit" value="Send">



</form>
<!-- Default form register -->

</div>
 @endsection