@extends('layoutmd')

@section('content')

<div class="container">

  <h1>Cart</h1>
  @if(session('success'))
  <div class="alert alert-success">
    <strong>Great!</strong> {{session('success')}}
  </div>
  @endif
  <div class="row">
      <table id="tablePreview" class="table table-hover table-striped table-bordered">
        <thead>
          <tr>
            <th>Sn</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th width="1px"></th>
          </tr>
        </thead>
        <tbody>
            @if(count($carts['result']) > 0)
              @php ($id = 1)
                @foreach ($carts['result'] as $cart)
                
                      <tr>
                        <td>{{$id++}}</td>
                        <td>{{$cart->name}}</td>
                      <td>{{$cart->price}}</td>
                      <td>{{$cart->quantity}}</td>
                      <td>{{$cart->tprice}}</td>
                      
                      <td><a href="{{url('deletecart/'.$cart->id.'/'.Auth::user()->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-times-circle"></i></a></td>
                      </tr>
                    
                @endforeach
              @else
                <p>No record</p>
            @endif
            <tr>
              <td></td>
              
              <td>Total</td>
              <td></td><td></td>
              <th>{{$carts['total']}}</th>
              <th>
                {{-- <a href="{{url('addorder/'.Auth::user()->id)}}" class="btn btn-success" style="">BUY</a> --}}
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                  Buy
                </button>
              </th>
            </tr>
        </tbody>
      </table>  
  </div>
</div>

<div class="container">
  <!-- Button to Open the Modal -->
  {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Open modal
  </button> --}}

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Select Service</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" align="center">
          <table border="0"  width="222px" >
            <tr>
              <td style="text-align:center">
                <a href="{{url('addorder/'.Auth::user()->id.'/1')}}" >
                <i class="fas fa-shopping-bag fa-5x"></i>
              </a>
              </td>
              <td style="text-align:center">
                <a href="{{url('addorder/'.Auth::user()->id.'/2')}}" >
                <i class="fas fa-motorcycle fa-5x"></i>
                </a>
              </td>
            </tr>
            <tr>
              <td style="text-align:center">
                Pickup
              </td>
              <td style="text-align:center">
                Delivery
              </td>
            </tr>
          </table>
          
          
          
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>

@endsection