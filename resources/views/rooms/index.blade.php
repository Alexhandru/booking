<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Backpack for Laravel</title>
    <script src="js/bootstrap.min.js"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

</head>
<body>


<h1> Rooms </h1>

@if(count($rooms) >0)
    @foreach($rooms as $room)
    
 
        <img src="{{ URL::asset($room->Picture) }}" alt="Backpack for Laravel" height="250" width="250">
        <h3> Location Name: {{$room->location['Name']}}</h3> 
        <h3> Room number: <a href="/rooms/review/{{$room->ID}}">{{$room->RoomNr}} </a> </h3>
        <h3> City: {{$room->location['City']}}</h3>
        <h3> Adress: {{$room->location['Adress']}}</h3>
           <h3> Number beds: {{$room->Beds}} </h3> 
          
          <h3> Category: {{$room->location['Category']}}</h3>
        @foreach($getmonths as $availableDisc)

            @if( $room->DiscountFK == $availableDisc->ID)
                <h3>Price with discount:  {{$room->discounts['discountAmount']}}</h3> 
            @else
                <h3> Room price: {{$room->Price}}  </h3> 
            @endif
        @endforeach
        
    @endforeach
@else

    <p>No rooms found </p>

@endif
</body>