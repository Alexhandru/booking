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

    .justify-content-center{
        height: 100%;

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
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th></th>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                    <th scope="col">City</th>
                    <th scope="col">Location</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>

                    @foreach($info as $item)
                        <tr>
                            <td></td>
                            <td> {{$item->BookingStart}} </td>
                            <td> {{$item->BookingEnd}} </td>
                            <td> {{$item->City}} </td>
                            <td> {{$item->Name}} <td>
                            <td>
                                <a href="/bookings/{{$item->ID}}/delete" type="button" class="btn btn-outline-danger">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
