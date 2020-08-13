@extends('layouts.app')
@section('content')
<style>
.backGG { height: 100%;
        width: 100%;
        opacity: 0.8;
        background: black;
        position: absolute;
        background-image: url('{{ asset('assets/backG.jpg')}}');
        background-size: cover;
        
        z-index: -1;
      
        background-repeat: no-repeat;
    background-attachment: fixed;
}

.list-group-item-info{
  background-color:rgb(105, 189, 210, 0.7);
  color: black !important;
}
.whiteTextOverride
{
 color: white !important;
}

h1 {
        background-color:rgb(105, 189, 210, 0.7);  
}
</style>
<div class="backGG"> </div>
<div class="page-header" style="text-align: center;">
     <h1>Room successfully reserved! </h1>
</div>
<img src="{{ URL::asset($company->LogoPicURL) }}" alt="Card image" height="250" width="250">

<h3 class='whiteTextOverride'>Thank you for reserving one of our rooms, {{$user->name}}. We have sent you a confirmation e-mail on {{$usermail}} . </h3>
 <h3 class='whiteTextOverride'>Hopefully we will meet you soon.
</h3>
<h4 class='whiteTextOverride'>Information about your reservation: </h4>
<ul class="list-group">
        
        <li class="list-group-item-info">Company name: {{$company->Name}}</li>
        <li class="list-group-item-info">Location Name: {{$location->Name}}</li>
        <li class="list-group-item-info">City: {{$location->City}}</li>
        <li class="list-group-item-info">Adress: {{$location->Adress}}</li>
        <li class="list-group-item-info">Room number: {{$room->RoomNr}}</li>
        <li class="list-group-item-info">Number of beds: {{$room->Beds}}</li>
        <li class="list-group-item-info">Booking from: {{$date}}</li>
        <li class="list-group-item-info">Booking to: {{$date2}}</li>
</ul>
<h4 class='whiteTextOverride'>If you have any questions please contact us by: </h4>
<ul>
<li style="background-color:rgb(105, 189, 210, 0.7);" >Email:  {{$company->Email}} </li>
<li style="background-color:rgb(105, 189, 210, 0.7);" >Telephone: {{$company->Telephone}}</li>

</ul>

@endsection