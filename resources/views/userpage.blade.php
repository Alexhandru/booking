@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                    <th scope="col">City</th>
                    <th scope="col">Location</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach($info as $item)
                        <tr>
                            <th scope="row"></th>

                            <td> {{$item->BookingStart}} </td>
                            <td> {{$item->BookingEnd}} </td>
                            <td> {{$item->City}} </td>
                            <td> {{$item->Name}} <td>

                        </tr>
                    @endforeach

                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
