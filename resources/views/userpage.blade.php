@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">

<style>
    .continutul{
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
        z-index:-1;
    }

</style>
<div class="ribbon">
    
</div>
<div class="container">
    
    <div class="row justify-content-center">
        <div class="continutul">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th></th>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                    <th scope="col">City</th>
                    <th scope="col">Location</th>
                    <th scope="col">Room </th>
                    <th scope="col">Leave Review</th>
                    <th scope="col">Cancel</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach($info as $item)
                        <tr>
                            <td></td>
                            <td> {{$item->BookingStart}} </td>
                            <td> {{$item->BookingEnd}} </td>
                            <td> {{$item->City}} </td>
                            <td> {{$item->Name}} </td>
                            <td><a href="{{ url('/rooms/review/'.$item->RoomFK ) }}">{{$item->RoomNr}}</a></td>
                            <td> 
                                <a href="/bookings/{{$item->ID}}/review" type="button" class="btn btn-outline-secondary">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                      </svg>
                                </a>    
                            </td>
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
