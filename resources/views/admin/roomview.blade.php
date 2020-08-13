@extends('layouts.admdboard')

@section('admin-content')
<div class="container">
    <div class="row justify-content-center">
        <div>
            <div>
              {{$rooms->links()}}
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Beds</th>
                        <th scope="col">RoomNr</th>
                        <th scope="col">Price</th>
                        <th scope="col">DiscountID</th>
                        <th scope="col">LocationID</th>
                        <th scope="col">ImageURL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rooms as $item)
                        <tr>
                            <th scope="row">{{$item->ID}}</th>
                            <td>{{$item->Beds}}</td>
                            <td>{{$item->RoomNr}}</td>
                            <td>{{$item->Price}}</td>
                            <td>{{$item->DiscountFK}}</td>
                            <td>{{$item->LocationFK}}</td>
                            <td>{{$item->Picture}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection