@extends('layouts.app')
@section('content')
<style>
.checked {
  color: orange;
}
.wrapper{
  position:static;
    height: 100%;
    width: 100%;
  
}
.backGG{
  opacity:0.9;
  height: 100%;
        width: 100%;
       
       background :rgb(105, 189, 210, 0.7);
        position: absolute;
        background-image: url('{{ asset('assets/backG.jpg')}}');
       
        z-index: -1;
        background-size: cover;
  
    background-repeat: no-repeat;
    background-attachment: fixed;
}
    .galerybox {
        position: relative; 
        background-color: lightblue;
        background :rgb(105, 189, 210, 0.7);  
       // width: 600px;
        border: 3px solid darkgray;
        padding: 10px;
        margin: 10px;
        text-align: center;
        width:1000px;
         margin:0 auto;"
    }


   
    .grid-with-columns {
        display: grid;
        grid: auto / auto auto auto auto auto auto;
        grid-gap: 3px;
        /* background-color: gray; */
        padding: 5px;
    }

    .grid-with-columns > div {
        background-color:gray;
        padding: 1px 0;
    }



.mySlide {
  display: none;
  
}

.slideImage{
    height:400px; 
    width:400px;
}

.cursor {
  cursor: pointer;
}


.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  
}


.next {
  right: 0;
}



.prev {
  left: 0;
}


.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.3);
}


.thumbnail-image {
  opacity: 0.6;
  width:50px;
  height:50px;
}

.active,
.thumbnail-image:hover {
  opacity: 1;
}
.list-group-item-info{
  background-color:rgb(105, 189, 210, 0.7);
}
.whiteTextOverride
{
 color: white !important;
}
.table-info{
  background-color:rgb(105, 189, 210, 0.7);
}
.blackTextOverride
{
 color: black !important;
}
</style>
 <div class="backGG"></div>
<div class="page-header" style="text-align: center;
 background-color:rgb(105, 189, 210, 0.7);">
     <h1>Reviews: </h1>
</div>

<div class="galerybox">
            <h4 >Image Gallery of Room: {{$roomNR}}</h4>
            <?php $i=0; 
            ?>
            @foreach($images as $image)
                <?php $i++; ?>
                <div class="mySlide">
                    <div> <?php echo $i;?> / <?php echo $nrimages;?></div>  
                    <img class="slideImage" src="{{ URL::asset($image->URL) }}" alt="">  
                </div>
            @endforeach

            <a class="prev" onclick="moveSlide(-1)">❮</a>
            <a class="next" onclick="moveSlide(1)">❯</a>

            <p id="caption">

            <div class="grid-with-columns" >
                <?php $i=0; ?>
                @foreach($images as $image)
                  <?php $i++; ?>
                  <div >
                    <img class="thumbnail-image cursor" src="{{ URL::asset($image->URL) }}" alt="" onclick="currentSlide(<?php echo $i;?>)" >
                  </div>
                @endforeach
            </div>

        </div>
        
      <ul class="list-group">
      @if( $rating == NULL)
      <li class="list-group-item-info"><h5 class='blackTextOverride'>Room Rating: Currently  no ratings available</h5></li>
      @else
        <li class="list-group-item-info"><h5 class='blackTextOverride'>Room Rating: {{$rating}} </h5></li>
      @endif

        <div id="reviews">
        <h3 class='whiteTextOverride'>Reviews: </h3>

    
        @foreach($values as $value)
     
        <li class="list-group-item-info"> <a class='blackTextOverride'>{{$value->name}} : {{$value->Description}}</a>
        <br>
       
        <a class='blackTextOverride'>Rating: {{$value->Rating}} </a>
        </li>
   
        @endforeach
        </ul>
        </div>
        <div id="dates">
        <h3 class="whiteTextOverride">reserved dates: </h3>
        <table class="table">
         <thead>
            <tr>
         <th class='whiteTextOverride' scope="col">From: </th>
         <th class ='whiteTextOverride'scope="col">To: </th>
         </thead>
         <tbody>
        @foreach($dates as $date)
            <tr>
             <td class="table-info">Start Date: {{$date->BookingStart}}</td>
          <td class="table-info"> End Date:  {{$date->BookingEnd}}</td>
          </tr>
        @endforeach

        </tbody>
        </table>

        </div>
        @foreach($getmonths as $availableDisc)

@if( $room->DiscountFK == $availableDisc->ID)
    <h3>Price with discount:  {{$room->discounts['discountAmount']}}</h3> 
@else
    <h3> Room price: {{$room->Price}}  </h3> 
@endif
@endforeach 

<script>
var slideIndex = 1;
showSlide(slideIndex);

function moveSlide(n) {
  showSlide(slideIndex += n);
}

function currentSlide(n) {
  showSlide(slideIndex = n);
}

function showSlide(n) {
  var i;
  var slides = document.getElementsByClassName("mySlide");
  var thumb = document.getElementsByClassName("thumbnail-image");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < thumb.length; i++) {
      thumb[i].className = thumb[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  thumb[slideIndex-1].className += " active";
  captionText.innerHTML = thumb[slideIndex-1].alt;
}
</script>  


@endsection