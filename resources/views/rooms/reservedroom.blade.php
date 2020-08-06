@extends('layouts.app')
@section('content')

<div class="page-header" style="text-align: center;
  background-color:	rgb(25, 121, 169);">
     <h1>Room successfully reserved! </h1>
</div>
<img src="{{ URL::asset($company->LogoPicURL) }}" alt="Card image" height="250" width="250">

<h3>Thank you for reserving one of our rooms, {{$user->name}}. Hopefully we will meet soon.</h3>
<h4>Information about your reservation: </h4>
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
<h4>If you have any questions please contact us by: </h4>
<ul>
<li>Email:  {{$company->Email}} </li>
<li>Telephone: {{$company->Telephone}}</li>

</ul>

@endsection