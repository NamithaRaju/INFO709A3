@extends('layoutmd')

@section('content')

<h1>Orders</h1>

<div class="container">
  <div class="row">
      <table id="tablePreview" class="table table-hover table-striped table-bordered">
          <thead>
            <tr>
              <th>Sn</th>
              <th>Name</th>
              <th>Option</th>
              <th>Date</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Total</th>
              {{-- <th width="1px"></th> --}}
            </tr>
          </thead>
          <tbody>
      @if(count($carts['result']) > 0)
      @php ($id = 1)
        @foreach ($carts['result'] as $cart)
        
              <tr>
                <td>{{$id++}}  </td>
                <td>{{$cart->name}}</td>
                <td>@if($cart->optionid == 1)
                  Pickup
                @else
                  Delivery
                @endif</td>
                <td>{{$cart->updated_at->format('jS M Y  ')}}</td>
                <td>{{$cart->price}}</td>
                <td>{{$cart->quantity}}</td>
                <td>{{$cart->tprice}}</td>
              
              {{-- <td><a href="{{url('deletecart/'.$cart->id.'/'.Auth::user()->id)}}" class="btn btn-danger glyphicon glyphicon-remove" onclick="return confirm('Are you sure?')"></a></td> --}}
              </tr>
            
        @endforeach
      @else
        <p>No record</p>
      @endif
              <tr>
                <td></td>
                
                <td>Total</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <th>{{$carts['total']}}</th>
                {{-- <th><a href="{{url('addorder/'.Auth::user()->id)}}" class="btn btn-success" style="">BUY</a></th> --}}
              </tr>
    </tbody>
    </table>    
  </div>
</div>

@endsection