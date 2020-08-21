@extends('layouts.app')
@section('content')
<style>
.backGG{
  min-height: 100vh;
        width: 100%;
        opacity: 0.9;
        background: black;
        position: absolute;
        background-image: url('{{ asset('assets/backG.jpg')}}');
        background-size: cover;
        z-index: -1;
        background-repeat: no-repeat;
    background-attachment: fixed;;
}
    .messagebox{
        background-color: #d9d9d9  ;
        border-style: solid;
        border-color:black;
        border-width: 3px;
       /* background :rgb(105, 189, 210);  */
        width: 1000px;
        height:200px;
        margin-top:200px;
        margin-left:500px;
        
        //margin:auto;
        text-align: center;

    }
    .wrapper{
        position:static;
    height: 100%;
    width: 100%;
    }
.message{
    padding-top:30px;
   // font-style:italic;
  font-weight: bold;
 color: black !important;
}
.message2{
    margin-top:15px;
    float:left;
    margin-left:30px;

}
.message3{
    //margin-top:15px;
    float:left;
    margin-left:30px;

}
</style>
<html>
<div class='backGG'>
    <div class='messagebox'>
        <div class='message'><h4> Hello {{$username}}, you already reserved this room.  </h4></div>
            <div class='message2'> <h5>For more information about reservation, check your mails, or bookings at your profile. </h5> </div>
            <div class='message3'> <h5>Take a look about the reserved room <a href="/rooms/review/{{$roomid}}"> here </a></h5>
         
    </div>
    
</div>
<br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br>
</html>
@endsection