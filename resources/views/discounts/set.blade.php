@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Set Discount</h1>
            <form  action="/{{$roomID}}/{{$locationID}}/set-Discount"  method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <span class="form-label">Discount Price</span>
                    <input name="DiscountPrice" class="form-control" type="text" placeholder="Discount Price">
                </div>
                <div class="form-group">
                    <span class="form-label">Start Date</span>
                    <input name="StartDate" class="form-control" type="date">
                </div>
                <div class="form-group">
                    <span class="form-label">End Date</span>
                    <input name="EndDate" class="form-control" type="date">
                </div>
                <div class="form-btn">
                    <button class="btn btn-primary">Set</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection