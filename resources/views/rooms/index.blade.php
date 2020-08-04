@extends('layouts.app')
@section('content')
<div class="page-header" style="text-align: center;
  background-color:	rgb(25, 121, 169);">
     <h1>Rooms: </h1>
</div>

@if(count($rooms) >0)
    @foreach($rooms as $room)
    
    <div class="card" style="width:400px;
      display:inline-block;
      background-color:rgb(105, 189, 210, 0.7);"
        >
        
        <h4 class="card-title">Location Name:{{$room->location['Name']}}</h4>    
    <div class="card-body">
        <img class="card-img-top" src="{{ URL::asset($room->Picture) }}" alt="Card image" height="250" width="250">
        
        
        <h3> Room number: <a>{{$room->RoomNr}} </a> </h3>
        <h3> City: {{$room->location['City']}}</h3>
       
           <h3> Number beds: {{$room->Beds}} </h3> 
          
          <h3> Category: {{$room->location['Category']}}</h3>
           
        @foreach($getmonths as $availableDisc)

            @if( $room->DiscountFK == $availableDisc->ID)
                <h3>Price with discount:  {{$room->discounts['discountAmount']}}</h3> 
            @else
                <h3> Room price: {{$room->Price}}  </h3> 
            @endif
        @endforeach
        <a href="/rooms/review/{{$room->ID}}" class="btn btn-primary">More about</a>
        <a href="" class="btn btn-success" style="float: right;">Reserve</a>
        </div>
    </div>
    @endforeach    
@else

    <p>No rooms found </p>

@endif
@endsection