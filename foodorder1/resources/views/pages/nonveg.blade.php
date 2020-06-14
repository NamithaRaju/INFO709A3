@extends('layoutmd')

@section('content')

<div class='col-lg-12'>
    @if(session('success'))
    <div class="alert alert-success" role="alert">
      <strong>Great!</strong> {{session('success')}}
    </div>
    @endif
    {{-- <div class="row">
        <div class="col-lg-2 d-none d-lg-block d-xl-block"> 
        <span class="site_name_small justify-content-center">Delights TakeAway</span>     
            <div id="list-example" class="list-group mt-2">
                @if(count($items)>0)
                    @foreach($categories as $category)
                        <a class="list-group-item list-group-item-action categoryClick category-{{$category->id}}-menu" data-categoryid="category-{{$category->id}}" href="#">{{strtoupper($category->name)}}</a>
                    @endforeach
                    <a class="list-group-item list-group-item-action categoryClickShowAll" href="#">All Products</a>
                    
                @endif
            </div>      
        </div> --}}
            
        @if(count($items)>0)
        <div class="col-lg-10">
            <div class="">
                <div class="">
                    <div class="col-lg-12">
                        <div class="row">        
                            @foreach($items as $item)
                                <div class="col-lg-3 col-md-6 col-sm-6 mb-4 category-{{$item->categoryid}} categoryListing">
                                    <div class="card product-listing p-4" style="height: 450px;">
                                      <!--Card image-->
                                      <div class="view overlay zoom">
                                        <img class="card-img-top hoverable" src="{{ asset('images').'/' . $item->image}}"
                                          alt="Card image cap">
                                        <a href="#!">
                                          <div class="mask rgba-white-slight"></div>
                                        </a>
                                      </div>
                                      <!--Card content-->
                                      <div class="card-body">
                                        <!--Title-->
                                        <h4 class="card-title product_name">{{$item->name}}</h4>
                                        <!--Text-->
                                        <p class="card-text product_desc">{{$item->description}}</p>
                                        <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                                        <a href="{{ url('addcart/'.$item->id) }}"  class="product-action-btn btn text-white btn-rounded waves-effect waves-light orange darken-3 productClickAction"><i class="fas fa-plus-circle"></i> Add</a>
                                        <span class="listing-amount deep-orange-text">${{$item->price}}</span>
                                      </div>
                                    </div>
                                    <!-- Card -->
                                </div>
                            @endforeach        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

 
@endsection
{{--<script>
    $(document).ready(function(){
      $userid = $('.container').find('.useridhidden').html();

      //onload
        $sum=0;
        // event.preventDefault();
        $.ajax({
            url:"{{ url('showcart') }}"+"/"+$userid,
            method: "GET",
            // data: {selectedCountry },
            contentType: false,
            dataType: "json",
            success:function(data){
              debugger;
                $('#tbody').html('');
                $('#tfoot').html('');
                data.forEach(element => {
                    $sum = $sum + element.price;
                    $('#tbody').append("<tr id='"+element.id+"'"+'><td>'+element.name+'</td><td>'+element.price+"</td><td></td><td><a href='#' id='"+element.id+"' class='remove btn btn-danger'>Remove</a></td></tr>'");
                });
                
                $('#tfoot').append('<tr><td>Total</td><td>'+$sum+'</td><td></td></tr>');
            },
            error: function(xhr, textStatus, error){
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
            }

        })
      //onadd
        $(".addClick").click(function(){
            $sum=0;
            var selectedDate = $(this).find('.hidden').html();
            event.preventDefault();
            $.ajax({
                url:"{{ url('addcart') }}"+"/"+selectedDate+"/"+$userid,
                method: "GET",
                // data: {selectedCountry },
                contentType: false,
                dataType: "json",
                success:function(data){
                  
                    // alert(data.price);
                    $('#tbody').html('');
                    $('#tfoot').html('');
                    data.forEach(element => {
                        $sum = $sum + element.price;
                        $('#tbody').append("<tr id='"+element.id+"'"+'><td>'+element.name+'</td><td>'+element.price+"</td><td></td><td><a href='#' id='"+element.id+"' class='remove btn btn-danger'>Remove</a></td></tr>'");
                    });
                    
                    $('#tfoot').append('<tr><td>Total</td><td>'+$sum+'</td><td></td></tr>');
                },
                error: function(xhr, textStatus, error){
                    console.log(xhr.statusText);
                    console.log(textStatus);
                    console.log(error);
                }

            })
        });

      //onremove
      $('#tbody').on('click', '.remove', function () {
          $id = $(this).attr('id');
          $sum=0;
          event.preventDefault();
            $.ajax({
                url:"{{ url('deletecart') }}"+"/"+$id+"/"+$userid,
                method: "GET",
                // data: {selectedCountry },
                contentType: false,
                dataType: "json",
                success:function(data){
                  debugger;
                    // alert(data);
                    // alert(data.price);
                    $('#tbody').html('');
                    $('#tfoot').html('');
                    data.forEach(element => {
                        $sum = $sum + element.price;
                        $('#tbody').append("<tr id='"+element.id+"'"+'><td>'+element.name+'</td><td>'+element.price+"</td><td></td><td><a href='#' id='"+element.id+"' class='remove btn btn-danger'>Remove</a></td></tr>'");
                    });
                    
                    $('#tfoot').append('<tr><td>Total</td><td>'+$sum+'</td><td></td></tr>');
                },
                error: function(xhr, textStatus, error){
                    console.log(xhr.statusText);
                    console.log(textStatus);
                    console.log(error);
                }

            })
        });
    });
    </script> --}}
{{-- @extends('layoutmd')

@section('content')

<div class='col-lg-12'>
    @if(session('success'))
    <div class="alert alert-success" role="alert">
      <strong>Great!</strong> {{session('success')}}
    </div>
    @endif
    <div class="row">
        <div class="col-lg-2 d-none d-lg-block d-xl-block"> 
        <span class="site_name_small justify-content-center">Delights TakeAway</span>     
            <div id="list-example" class="list-group mt-2">
              <a class="list-group-item list-group-item-action active" href="#list-item-1">Non Veg</a>
              <a class="list-group-item list-group-item-action" href="#list-item-2">Veg</a>
              <a class="list-group-item list-group-item-action" href="#list-item-3">Drinks</a>
              <a class="list-group-item list-group-item-action" href="#list-item-4">Category 4</a>
            </div>      
        </div>
            
        @if(count($items)>0)
        <div class="col-lg-10">
            <div class="">
                <div class="">
                    <div class="col-lg-12">
                        <div class="row">        
                            @foreach($items as $item)
                                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                                    <div class="card product-listing p-4" style="height: 450px;">
                                      <!--Card image-->
                                      <div class="view overlay zoom">
                                        <img class="card-img-top hoverable" src="{{ asset('images').'/' . $item->image}}"
                                          alt="Card image cap">
                                        <a href="#!">
                                          <div class="mask rgba-white-slight"></div>
                                        </a>
                                      </div>
                                      <!--Card content-->
                                      <div class="card-body">
                                        <!--Title-->
                                        <h4 class="card-title product_name">{{$item->name}}</h4>
                                        <!--Text-->
                                        <p class="card-text product_desc">{{$item->description}}</p>
                                        <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                                        <a href="{{ url('addcart/'.$item->id) }}"  class="product-action-btn btn text-white btn-rounded waves-effect waves-light orange darken-3 productClickAction"><i class="fas fa-plus-circle"></i> Add</a>
                                        <span class="listing-amount deep-orange-text">${{$item->price}}</span>
                                      </div>
                                    </div>
                                    <!-- Card -->
                                </div>
                            @endforeach        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

 
@endsection

  
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


 <script>
  $(document).ready(function(){
    $('[data-toggle="popover"]').popover({trigger: "hover"});  //remove {trigger: "hover"} for click
});
  </script> --}}