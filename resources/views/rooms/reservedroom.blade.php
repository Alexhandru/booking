@extends('layouts.app')
@section('content')
<style>
.backGG {  min-height: 100vh;
        width: 100%;
       
        background: black;
        position: absolute;
        background-image: url('{{ asset('assets/backG.jpg')}}');
        background-size: cover;
        z-index: -1;
        background-repeat: no-repeat;
        background-attachment: fixed;
}
.list-group{
        width:550px;
        height:550px;

}
.list-group-item{

background-color: #d9d9d9  ;

}
.whiteTextOverride
{
 color: white !important;
}

li {
        background-color: #d9d9d9  ;    
}
.informations{
        margin-left:90px;
        width:550px;
        height:550px;
        
}
.contacts{
        width:550px;
        height:550px;
}
.message{
        
        color:white;
        margin-top:80px;
        margin-left:30px;
}
.img{
        margin-left:90px;
}
.bold{
        font-style:italic;
  font-weight: bold;
}
</style>
<div class="backGG"> 
<div class="page-header" style="text-align: center; color:white;">
     <h1>Room successfully reserved! </h1>
</div>

<div class='row'>
<img src="{{ URL::asset($company->LogoPicURL) }}" alt="Card image" height="250" width="250" class='img'>

<h5 class='message'>Thank you for reserving one of our rooms, {{$user->name}}. We have sent you a confirmation e-mail on {{$usermail}}. <br></br>
Hopefully we will meet you soon.
</h5>
</div>

<br></br>
<div class='row'>
<div class="col-sm-6">
<div class='informations'>
<h4 class='whiteTextOverride'>Information about your reservation: </h4>
<ul class="list-group">
        
        <li class="list-group-item" ><a class='bold'>Company name: </a> {{$company->Name}} </li>
        <li class="list-group-item"><a class='bold'>Location Name:  </a>{{$location->Name}}</li>
        <li class="list-group-item"><a class='bold'>City:  </a>{{$location->City}}</li>
        <li class="list-group-item"><a class='bold'>Adress:  </a>{{$location->Adress}}</li>
        <li class="list-group-item"><a class='bold'>Room number:  </a>{{$room->RoomNr}}</li>
        <li class="list-group-item"><a class='bold'>Number of beds:  </a>{{$room->Beds}}</li>
        <li class="list-group-item"><a class='bold'>Booking from:  </a>{{$date}}</li>
        <li class="list-group-item"><a class='bold'>Booking to:  </a>{{$date2}}</li>
</ul>
</div>
</div>
<div class='col-sm-6'>
<h4 class='whiteTextOverride'>If you have any questions please contact us by: </h4>
<ul class=list-group>
<li class="list-group-item"><a class='bold'>Email:  </a>{{$company->Email}} </li>
<li class="list-group-item"><a class='bold'>Telephone: </a>{{$company->Telephone}}</li>



</div>
</div>

</ul>

</div>
@endsection