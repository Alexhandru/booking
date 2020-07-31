@extends('layouts.app')
@section('content')
<style>

    .galerybox {
        position: relative; /*(needed to position the left and right arrows)*/
        background-color: lightblue;
       // width: 600px;
        border: 3px solid darkgray;
        padding: 10px;
        margin: 10px;
        text-align: center;
        width:1000px;
         margin:0 auto;"
    }


    /* this is a grid with columns (the nr of columns = the number of auto after "/"), to display thumbnails: */
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


/* Hide the images by default */
.mySlide {
  display: none;
  
}

.slideImage{
    height:400px; 
    width:400px;
}
/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
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
  /* user-select: none;
  -webkit-user-select: none; */
}

/* Position the "next button" to the right */
.next {
  right: 0;
}


/* Position the "prev button" to the left */
.prev {
  left: 0;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.3);
}

/* Add a transparency effect for thumbnail images */
.thumbnail-image {
  opacity: 0.6;
  width:50px;
  height:50px;
}

.active,
.thumbnail-image:hover {
  opacity: 1;
}
</style>
 
<div class="page-header" style="text-align: center;
 // background-color:	rgb(25, 121, 169);">
     <h1>Reviews: </h1>
</div>

<div class="galerybox">
            <h4 >Image Gallery of Room: {{$roomNR}}</h4>
            <?php $i=0; //$nrimages;//$images.length(); //ide beirod az $images count-jat
            ?>
            @foreach($images as $image)
                <?php $i++; ?>
                <div class="mySlide">
                    <div> <?php echo $i;?> / <?php echo $nrimages;?></div>  <!--class="numbertext"-->
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
        
        <li class="list-group-item"><h5>Room Rating: {{$rating}} </h5></li>
         
        <li class="list-group-item"> <h5>Reviewes:</h5> </li>
        
        <h3>Room Number: {{$roomNR}}</h3>
        <br>
        <h3>Reviews: </h3>
        <ul>
        @foreach($values as $value)
        <li class="list-group-item-info"> {{$value->name}} : {{$value->Description}}
        <br>
       
        <a>Rating: {{$value->Rating}} </a>
        </li>
             
        @endforeach
        </ul>

        <h1>reserved dates: </h1>
        <table class="table">
         <thead>
            <tr>
         <th scope="col">From: </th>
         <th scope="col">To: </th>
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