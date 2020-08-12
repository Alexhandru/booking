@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
<style>
       .col-md-8{
        background: white;
        margin-top:5%;
        padding: 50px;
        height: 100%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .container {
        height: 100%;
        font-family: 'Quicksand', sans-serif;
    }
    .ribbon {
        height: 100%;
        width: 100%;
        position: absolute;
        background-image: url('{{ asset('assets/backG.jpg')}}');
        background-size: cover;
    }
</style>
<div class="ribbon">
    
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Write a Review</h1>
            <form  action="/bookings/{{$bookingID}}/review"  method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="desc">Example textarea</label>
                    <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                  </div>
                <div class="form-group">
                    <label class="mr-sm-2" for="rating">Rating</label>
                    <select class="custom-select mr-sm-2" id="rating" name="rating">
                      <option selected>Choose...</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                    </select>
                  </div>
                <div class="form-btn">
                    <button class="btn btn-primary">Done</button>
                </div>
               
              </form>
        </div>
    </div>
</div>
@endsection