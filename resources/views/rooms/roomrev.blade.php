@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<style>
.event a {
           // background-color: #5FBA7D !important;
           background-color:  #ffaa80 !important;
            color: #ffffff !important;
           
         
        }
.checked {
  color: orange;
}
.wrapper{
  position:static;
    height: 100%;
    width: 100%;
  
} 

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
    .galerybox {

        position: relative; 
        background-color: #d9d9d9  ;
       
       /* background :rgb(105, 189, 210);  */
        width: 600px;
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
.list-group-item{
  background-color: #d9d9d9  ;
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
  font-style:italic;
  font-weight: bold;
 color: black !important;
}
.description{
  background-color: #d9d9d9  ;
  border-style: solid;
            border-color:black;
            border-width: 3px;
       /* background :rgb(105, 189, 210);  */
        width: 1000px;
        margin:auto;
        text-align: center;
}
.rating{
  padding-left:20px;
  padding-top:10px;
  //padding-bottom:10px;
  float:left;
}
.text{
  padding:50px;
}
</style>
<html>
<div class="backGG">

  <div class="page-header" style="text-align: center;
      margin:auto;
        max-width:50vh;
        color:black;">
     <h5><br></br>  </h5>
     
  </div>

    <div class="galerybox">
            <h4 >Image Gallery of Room {{$roomNR}}</h4>
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
 
      
      <!-- @if( $rating == NULL)
      <h5 class='whiteTextOverride'>Room Rating: Currently  no ratings available</h5>
      @else
       <h5 class='whiteTextOverride'>Room Rating: {{ number_format($rating, 1)}} </h5>
      @endif -->
      <br></br>
      <div class='description'>
      @if( $rating == NULL)
      <h4 class='rating' >Room Rating: Currently  no ratings available</h4>
      @else
       <h4 class='rating'>Room Rating: {{ number_format($rating, 1)}} </h4>
      @endif
       <h6 class='text' >{{$locdesc}}</h6>




      </div>
     <br></br> 
     <div class='row'>
     <div class="col-sm-8">
      <h3 class='whiteTextOverride'>Reviews: </h3>
      </div>
      <div class="col-sm-4">
      <h3 class='whiteTextOverride'>Reserved dates: </h3>
      </div>
      </div>
  <div class='row'>
  
    <div class="col-sm-8">
      <div class='reviews'>
        

        <ul class="list-group">
        @foreach($values as $value)
     
        <li class="list-group-item"><a class='blackTextOverride'>{{$value->name}} </a>: {{$value->Description}}
        <br>
       
        <a>Rating: {{$value->Rating}} </a>
       </li>
   
        @endforeach
        </ul>
      </div>
    </div>
    <!-- <?php $eventDates=array();
    $j=0;
    ?>
    @foreach($ocdates as $dateee)
    <?php $eventDates[$j]=$dateee;
    
    ?>
          <h1>{{$dateee}}</h1>
    @endforeach -->
        
          <!-- <h3 class="whiteTextOverride">reserved dates: </h3>
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
          </table> -->

       
        <div class="col-sm-4">
          <div id="datepicker"></div>
        </div>
  </div>
  
</div>

</html>
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



var events = @json($ocdates);
calendarrr(events);

 function calendarrr(events) {
  var eventDates = {};
  events.forEach(function(item,index){
     var s=item.substring(0,item.length-1); //trim last Z from date
     var d=new Date(s);
     eventDates[d]=d;
   });

    // datepicker
    
       $('#datepicker').datepicker({
        
        beforeShowDay: function( date ) {
            var highlight = eventDates[date];
            if( highlight ) {
                 return [true, "event", "occupied"];
            } else {
                 return [true, '', ''];
            }
        },minDate: new Date()
    });
};
   



</script>  


@endsection