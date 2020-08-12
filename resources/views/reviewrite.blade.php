@extends('layouts.app')

@section('content')
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