<!DOCTYPE html>
<html lang="en">
<head>
  <title>Delights takeaway</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Bad+Script&family=Barlow:wght@500&family=Jaldi&family=Kaushan+Script&display=swap" rel="stylesheet">
  
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }

    .JumboHeaderImg{
      background-image: url("{{ asset('images/image.jpg') }}")/*url('images/image.jpg');*/;
	background-size: cover;
	background-repeat: no-repeat;
  color:white;
    }
    .product_name
    {
      font-family: 'Barlow', sans-serif;
    }

    .product_desc
    {
      font-family: 'Jaldi', sans-serif;
      font-size: 1.9rem;
    }

    .site_name_big
    {
      font-family: 'Kaushan Script', cursive;
      text-shadow: black 2px 6px 6px;
      font-size: 7.5em !important;
    }

    .site_tagline
    {
      font-family: 'Bad Script', cursive;
      font-size: 3em !important;
      text-shadow: black 2px 2px 2px;
    }

    /*
    .panel{
      height:300px;
    }
    .panel-body{
      height:200px
    }
    */


   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
    .panel:hover {
      /* transform: scale(1.09);  */
      box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
    }
  </style>
</head>
<body>

<div class="jumbotron JumboHeaderImg">
  <div class="container text-center">
    <h1 class="site_name_big">Delights TakeAway</h1>      
    <p class="site_tagline">Mission, Vission & Values</p>
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">

        <li><a href="/foodorder/public">Home</a></li>
       {{-- <li><a href="/foodorder/public/products">Products</a></li>--}}
        
        
            <li><a href="/foodorder/public/nonveg">Non Vegs</a></li>
            <li><a href="/foodorder/public/veg">Vegs</a></li>
            <li><a href="/foodorder/public/drinks">Drinks</a></li>
        <li><a href="#">Stores</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if(Auth::check())
        
          
          <li><a href=""><span class="glyphicon glyphicon-user"></span>{{ Auth::user()->name }}</a></li>
          <li><a href="{{url('showcart/'.Auth::user()->id)}}"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
          <li><a href="{{url('showorder/'.Auth::user()->id)}}"><span class="glyphicon glyphicon-shopping-cart"></span> Order</a></li>
        <li><a href="{{url('logout')}}"><span class="glyphicon glyphicon-user"></span>Logout</a></li>
        @else
        <li><a href="{{url('login')}}"><span class="glyphicon glyphicon-user"></span>Login</a></li>
        <li><a href="{{url('registration')}}"><span class="glyphicon glyphicon-user"></span>Register</a></li>
        
        @endif

      </ul>
    </div>
  </div>
</nav>

<div class="container">   
@yield('content') 
  
</div>

{{-- <footer class="container-fluid text-center">
  <p>Online Store Copyright</p>  
  <form class="form-inline">Get deals:
    <input type="email" class="form-control" size="50" placeholder="Email Address">
    <button type="button" class="btn btn-danger">Sign Up</button>
  </form>
</footer> --}}




</body>
</html>