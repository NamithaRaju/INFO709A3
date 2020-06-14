<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kodurs Kitchen</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<!-- Google Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
	<!-- Bootstrap core CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.16.0/css/mdb.min.css" rel="stylesheet">
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
      background-image: url("{{ asset('images/fav.jpg') }}")/*url('images/image.jpg');*/;
      background-size: cover;
      background-repeat: no-repeat;
      color:white;
      height: 300px;
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

    @media (min-width: 576px)
    .site_name_big
      {
        font-family: 'Kaushan Script', cursive;
        text-shadow: black 2px 6px 6px;
        font-size: 5em !important;
      }

    .site_name_big
    {
      font-family: 'Kaushan Script', cursive;
      text-shadow: black 2px 6px 6px;
      font-size: 7.5em !important;
    }

    .site_name_small
    {
      font-family: 'Kaushan Script', cursive;
      /*text-shadow: black 2px 6px 6px;*/
      font-size: 2em !important;
    }

    .site_tagline
    {
      font-family: 'Bad Script', cursive;
      font-size: 3em !important;
      text-shadow: black 2px 2px 2px;
    }

    .card-img-top
    {
	    height: 300px;
    }
    .card-text
    {
    	height: 40px;
    }

    .listing-amount
    {
  		float: right;
  		font-weight: bold;
  		font-style: italic;
  		font-size: 2em;
    }

    .product-action-btn 
    { 
      padding: 9px 19px 9px;
      border-radius:50px;
    }
    .product-listing:hover
    {
      -webkit-transform: scale(1.1);
      transform: scale(1.1);
      -webkit-transition: all 0.4s linear;
      transition: all 0.4s linear;
    }
    .list-group-item.active
    {
      background-color: #212121 !important;
      border-color: #ffffff;
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
    .sbtn{
      margin: 0;
    }
  </style>
</head>

<body>

<div class="jumbotron JumboHeaderImg d-none d-lg-block d-xl-block">
  <div class="container text-center">
    <h1 class="site_name_big d-none d-lg-block d-xl-block">Kodurs Kitchen</h1>      
    <p class="site_tagline d-none d-lg-block d-xl-block">Enjoy a Taste of Heaven</p>
  </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark elegant-color-dark">
  <!-- Navbar brand -->
  <a class="navbar-brand d-none d-sm-block d-md-block d-xs-block d-lg-none d-xl-none" href="#">Kodurs Kitchen</a>

  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="basicExampleNav">
      <ul class="navbar-nav mr-auto">

        <li class="nav-item"><a class="nav-link" href="{{url('/')}}">Home</a></li>
        <li class="nav-item"><a class="nav-link"href="{{url('/nonveg')}}">Non Vegs</a></li>
        <li class="nav-item"><a class="nav-link"href="{{url('/veg')}}">Vegs</a></li>
        <li class="nav-item"><a class="nav-link"href="{{url('/drinks')}}">Drinks</a></li>
        <li class="nav-item"><a class="nav-link"href="{{url('/desserts')}}">Desserts</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('/contact')}}">Contact</a></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="nav-item">
          <form class="form-inline" action="{{url('search')}}" method="post">
            {{ csrf_field() }}
                <input class="form-control mr-sm-2" type="text" placeholder="Search" name="search">
                <button class="btn btn-success sbtn" type="submit">Search</button>
              </form>
        </li>
        @if(Auth::check())
        
          
          <li class="nav-item"><a class="nav-link" href=""><span class="glyphicon glyphicon-user"></span><i class="fas fa-user"></i> {{ Auth::user()->name }}</a></li>
          <li class="nav-item"><a class="nav-link" href="{{url('showcart/'.Auth::user()->id)}}"><i class="fas fa-cart-plus"></i> Cart</a></li>
          <li class="nav-item"><a class="nav-link" href="{{url('showorder/'.Auth::user()->id)}}"><i class="fas fa-list"></i> View Orders</a></li>
        <li class="nav-item"><a class="nav-link deep-orange-text" href="{{url('logout')}}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        @else
        <li class="nav-item"><a class="nav-link" href="{{url('login')}}"><span class="glyphicon glyphicon-user"></span>Login</a></li>
        <li class="nav-item"><a class="nav-link" href="{{url('registration')}}"><span class="glyphicon glyphicon-user"></span>Register</a></li>
        
        @endif

      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">   
@yield('content') 
  
</div>

  {{--<div class="container mt-5">


    <!--Section: Content-->
    <section class="text-center dark-grey-text">

      <!-- Section heading -->
      <h3 class="font-weight-bold mb-4 pb-2">Testimonials</h3>

      <div class="wrapper-carousel-fix">
        <!-- Carousel Wrapper -->
        <div id="carousel-example-1" class="carousel no-flex testimonial-carousel slide carousel-fade" data-ride="carousel"
          data-interval="false">
          <!--Slides-->
          <div class="carousel-inner" role="listbox">
            <!--First slide-->
            <div class="carousel-item active">
              <div class="testimonial">
                <!--Avatar-->
                <div class="avatar mx-auto mb-4">
                  <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(30).jpg" class="rounded-circle img-fluid"
                    alt="First sample avatar image">
                </div>
                <!--Content-->
                <p>
                  <i class="fas fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod
                  eos
                  id officiis hic tenetur quae quaerat ad velit ab. Lorem ipsum dolor sit amet, consectetur
                  adipisicing elit. Dolore cum accusamus eveniet molestias voluptatum inventore laboriosam labore
                  sit, aspernatur praesentium iste impedit quidem dolor veniam.
                </p>
                <h4 class="font-weight-bold">Anna Deynah</h4>
                <h6 class="font-weight-bold my-3">Founder at ET Company</h6>
                <!--Review-->
                <i class="fas fa-star blue-text"> </i>
                <i class="fas fa-star blue-text"> </i>
                <i class="fas fa-star blue-text"> </i>
                <i class="fas fa-star blue-text"> </i>
                <i class="fas fa-star-half-alt blue-text"> </i>
              </div>
            </div>
            <!--First slide-->
            <!--Second slide-->
            <div class="carousel-item">
              <div class="testimonial">
                <!--Avatar-->
                <div class="avatar mx-auto mb-4">
                  <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(31).jpg" class="rounded-circle img-fluid"
                    alt="Second sample avatar image">
                </div>
                <!--Content-->
                <p>
                  <i class="fas fa-quote-left"></i> Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut
                  odit
                  aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque
                  porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia
                  non numquam eius modi tempora incidunt ut labore. </p>
                <h4 class="font-weight-bold">Maria Kate</h4>
                <h6 class="font-weight-bold my-3">Photographer at Studio LA</h6>
                <!--Review-->
                <i class="fas fa-star blue-text"> </i>
                <i class="fas fa-star blue-text"> </i>
                <i class="fas fa-star blue-text"> </i>
                <i class="fas fa-star blue-text"> </i>
                <i class="fas fa-star blue-text"> </i>
              </div>
            </div>
            <!--Second slide-->
            <!--Third slide-->
            <div class="carousel-item">
              <div class="testimonial">
                <!--Avatar-->
                <div class="avatar mx-auto mb-4">
                  <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(3).jpg" class="rounded-circle img-fluid"
                    alt="Third sample avatar image">
                </div>
                <!--Content-->
                <p>
                  <i class="fas fa-quote-left"></i> Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                  culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus
                  error sit voluptatem accusantium doloremque laudantium.</p>
                <h4 class="font-weight-bold">John Doe</h4>
                <h6 class="font-weight-bold my-3">Front-end Developer in NY</h6>
                <!--Review-->
                <i class="fas fa-star blue-text"> </i>
                <i class="fas fa-star blue-text"> </i>
                <i class="fas fa-star blue-text"> </i>
                <i class="fas fa-star blue-text"> </i>
                <i class="far fa-star blue-text"> </i>
              </div>
            </div>
            <!--Third slide-->
          </div>
          <!--Slides-->
          <!--Controls-->
          <a class="carousel-control-prev left carousel-control float-left" href="#carousel-example-1" role="button"
            data-slide="prev">
            <i class="fas fa-chevron-left fa-9x text-dark"></i>
          </a>
          <a class="carousel-control-next right carousel-control" href="#carousel-example-1" role="button"
            data-slide="next">
            <i class="fas fa-chevron-right fa-9x text-dark"></i>
          </a>
          <!--Controls-->
        </div>
        <!-- Carousel Wrapper -->
      </div>

    </section>
    <!--Section: Content-->


  </div> --}}    

<!-- Footer -->
<footer class="page-footer font-small unique-color-dark pt-4 mt-5">

  <!-- Footer Elements -->
  <div class="">

    <!-- Call to action -->
    <ul class="list-unstyled list-inline text-center py-2">
      @if(!Auth::check())
      <li class="list-inline-item">
        <h5 class="mb-1">Register Now</h5>
      </li>
      <li class="list-inline-item">
        <a href="#!" class="btn btn-outline-white orange darken-3 btn-rounded">Sign up!</a>
      </li>
      @endif
    </ul>
    <!-- Call to action -->

  </div>
  <!-- Footer Elements -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© {{date('Y')}}
    <a href="#" class="deep-orange-text"> Delight TakeAway</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->


	<!-- JQuery -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.16.0/js/mdb.min.js"></script>

  <script type="text/javascript">
         $(document).ready(function(){
            $('.productClickAction').click(function() {
                console.log("Clicked");
                $(this).html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Adding...').addClass('disabled');
            });

            $('.categoryClick').click(function(){

              var categoryID = $(this).attr('data-categoryid');

              $('.categoryClick').removeClass("active");

              $('.categoryListing').fadeOut('slow');

              /*$('.categoryListing').addClass("d-none");*/
              $('.'+categoryID+'-menu').addClass('active');

              $('.'+categoryID).fadeIn('slow');
              
              //$('.'+categoryID).removeAttr('style');              
                  debugger;
              console.log(categoryID);

            });

            $('.categoryClickShowAll').click(function(){

              $('.categoryListing').fadeIn("slow");
              $('.categoryClick').removeClass("active");

            });
        });
  </script>


	</body>
</html>