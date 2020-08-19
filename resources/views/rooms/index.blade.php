
@extends('layouts.app')

@section('content')
<style>
.wrapper{
  position:static;
    height: 100%;
    width: 100%;
  
} 


</style>

<div class="backGG" style="  min-height: 100vh;
        width: 100%;
        opacity: 0.9;
        background: black;
        position: absolute;
        background-image: url('{{ asset('assets/backG.jpg')}}');
        background-size: cover;
        z-index: -1;
        background-repeat: no-repeat;
        background-attachment: fixed;">
        <div class="page-header" style="text-align: center;
            margin:auto;  max-width:50vh;">
            <h1> Available rooms: </h1>
        </div>

    @if(count($rooms) >0)
   
    @foreach($rooms as $room)
    
        <div class="card" style="width:400px; height: 570px;
            display:inline-block; 
            background-color: #d9d9d9 ;
            margin-left: 10px;
            margin-right: 10px;
            margin-top: 20px;
            padding-top:10px;
            border-style: solid;
            border-color:black;
            border-width: 3px;" >
        
            <h3 class="card-title" style="text-align: center;"> Room number: <a>{{$room->RoomNr}} </a> </h3>    
            <div class="card-body">
                <img class="card-img-top" src="{{ URL::asset($room->Picture) }}" alt="Card image" height="250" width="250">
        
                <h4> Number beds: {{$room->Beds}} </h4> 
                <h5> City: {{$room->location['City']}} </h5>
                <h5> Room rating:  {{ number_format($rating[$index], 1)}} </h5>
          
           
                @foreach($getmonths as $availableDisc)
                    @if( $room->DiscountFK == $availableDisc->ID)
                        <h5>Price with discount:  {{$room->discounts['discountAmount']}}</h5> 

                        <h6><br>( Available until: {{$room->discounts['dateEnd']}})</br> </h6>
                    @else
                        <h5> Room price: {{$room->Price}}  </h5> 
                        <h6> <br></br></h6>
                    @endif
                @endforeach

             
                <!-- $nr={{$room->ID}};
                        -->
                        
                
                <a href="/rooms/review/{{$room->ID}}" class="btn btn-secondary"> More about </a>
            @if  (!Auth::guest())

            <a href="{{action('Controller@insert',['id'=>$room->ID,'date'=>$date, 'date2'=>$date2, 'iduser'=>Auth::user()->id])}}"  name='reservb' value='reservb' class="btn btn-info" style="float: right;">Reserve</a>
                
            @endif
        </div>  
    
    </div>
    <php {{ ++$index }} ?>
    @endforeach 
    


    @else

    <p>No rooms found </p>

    @endif
</div> 
  <!-- background -->

@endsection
