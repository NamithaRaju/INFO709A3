@extends('layout')

@section('content')
<div class="row">
    @if(count($items)>0)
        @foreach($items as $item)
        <div class="col-sm-4">
            <div class="panel panel-primary">
            <div class="panel-heading">{{$item->name}}</div>
              <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
            <div class="panel-footer">{{$item->price}}</div>
            </div>
          </div>
        @endforeach
    @else
    @endif
    
  </div>
  @endsection