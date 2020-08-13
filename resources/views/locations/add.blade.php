@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Add a new Location</h1>
            <form  action="/add-Location"  method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <span class="form-label">Name</span>
                    <input id="Name" name="Name" class="form-control" type="text" placeholder="Name" >
                </div>
                <div class="form-group">
                    <span class="form-label">Address</span>
                    <input name="Address" class="form-control" type="text" placeholder="Address">
                </div>
                <div class="form-group">
                    <span class="form-label">Category</span>
                    <input name="Category" class="form-control" type="text" placeholder="Category">
                </div>
                <div class="form-group">
                    <span class="form-label">City</span>
                    <input name="City" class="form-control" type="text" placeholder="City">
                </div>
                <div class="form-group">
                    <span class="form-label">Company</span>
                    <select name="CompanyName" class="form-control" id="select">
                            @foreach ($companies as $company)
                                <option value="{{$company->name}}">{{$company->name}}</option>
                             @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <span class="form-label">URL</span>
                    <input name="URL" class="form-control" type="text" placeholder="URL">
                </div>
                <div class="form-btn">
                    <button class="btn btn-primary">Add</button>
                </div>
               
              </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
<script>
      $(document).ready(function () {
      $('select').selectize({
          sortField: 'text'
      });
  });
</script>
@endsection