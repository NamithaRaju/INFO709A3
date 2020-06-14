@extends('layout')

@section('content')

<div class='col-md-12'>
<div class="row" >
  @if(session('success'))
    <div class="alert alert-success">
      <strong>Great!</strong> {{session('success')}}
    </div>
    @endif
  <h3 >All</h3>
    @if(count($items)>0)
        @foreach($items as $item)
        <div class="col-sm-3">
            <div class="panel panel-primary">
            <div class="panel-heading">{{$item->name}}</div>
              <div class="panel-body"><span id="popover" href="" title="{{$item->name}}" data-toggle="popover" data-placement="top" data-content="{{$item->description}}"><img src="{{ asset('images').'/' . $item->image}}" class="img-responsive" style="width:100%" alt="Image"></span></div>
            <div class="panel-footer" style="text-align:center">${{$item->price}}
            {{--<a href="#" class="addClick">add--}}
              
          <a href="{{ url('addcart/'.$item->id) }}" class="btn btn-success align-centre glyphicon glyphicon-plus"></a></div>
          
              <div class="hidden">{{$item->id}}</div>
            </a>
            </div>
          </div>
        @endforeach

                    @if(count($items)>0)
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row"> 
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            @foreach($items as $item)
                                            <div class="col-lg-6">
                                                <div class="single_menu_list">
                                                    <img alt="" style="background: url({{ asset('images').'/' . $item->image}}) 50% 50% no-repeat;">
                                                    <div class="menu_content">
                                                        <h4>{{$item->name}}  <span>${{$item->price}} </span></h4>
                                                        <p>{{$item->description}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                           @endforeach 
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
 
    
    @else
    @endif
    
  </div>

 
  @endsection

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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

    
<script>
  $(document).ready(function(){
    $('[data-toggle="popover"]').popover({trigger: "hover"});  //remove {trigger: "hover"} for click
});
  </script>