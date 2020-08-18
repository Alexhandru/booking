@extends('layouts.admdboard')

@section('admin-content')
<style>
table {
    table-layout: auto;
    width:100%;
}
.piccol {
    column-width: 150px;
    overflow-wrap: break-word;
    hyphens: auto;
}
</style>

<div class="container">
    <div class="row justify-content-center">
        <div>
            <div class="row">
                <div class="col">
                    <a href="/dashboard/room/{{$id}}/add" class="btn btn-primary" role="button">Add a new room</a>
                </div>
                <div class="col">
                    <input class="form-control" id="filterBeds" type="text" placeholder="Beds">
                </div>
                <div class="col">
                    <input class="form-control" id="filterPrice" type="text" placeholder="Price">
                </div>
                <div class="col">
                    <input class="form-control" id="filterRoomNr" type="text" placeholder="RoomNr">
                </div>
            </div>
            <br><br>
            <table class="table">
                
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Beds</th>
                        <th scope="col">RoomNr</th>
                        <th scope="col">Price</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Gallery</th>
                        <th scope="col">Picture</th>
                    </tr>
                </thead>
                <tbody id="roomResults">
                    @foreach ($rooms as $item)
                        <tr>
                            <th scope="row">{{$item->ID}}</th>
                            <td>{{$item->Beds}}</td>
                            <td>{{$item->RoomNr}}</td>
                            <td>{{$item->Price}}</td>
                            <td>
                                @if($item->DiscountFK == NULL)
                                    <a href="/dashboard/room/{{$id}}/discount/{{$item->ID}}" type="button" class="btn btn-outline-info">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-tags-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M3 1a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l4.586-4.586a1 1 0 0 0 0-1.414l-7-7A1 1 0 0 0 7.586 1H3zm4 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                            <path d="M1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z"/>
                                          </svg>
                                    </a>
                                @else
                        
                                        S:{{$item->dateStart}} - E:{{$item->dateEnd}} ; Discount: {{$item->discountAmount}}
                                        <form action="/{{$id}}/{{$item->ID}}/delete-Discount" method="POST">
                                            {{ csrf_field() }}
                                            <button style="display: inline" class="btn btn-outline-danger">
                                                <svg style="display: inline" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                    <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
                                                    <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
                                                </svg>
                                            </button>
                                        </form>
                                @endif
                            </td>
                            <td>
                                <a href="/gallery/{{$item->ID}}" type="button" class="btn btn-outline-warning">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-images" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M12.002 4h-10a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1zm-10-1a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-10z"/>
                                        <path d="M10.648 8.646a.5.5 0 0 1 .577-.093l1.777 1.947V14h-12v-1l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71z"/>
                                        <path fill-rule="evenodd" d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM4 2h10a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1v1a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2h1a1 1 0 0 1 1-1z"/>
                                      </svg>
                                </a>
                            </td>
                            <td>
                                <div class="piccol">
                                    {{$item->Picture}}
                                </div>
                            </td>
                            <td>
                                <a href="/dashboard/room/{{$id}}/edit/{{$item->ID}}" type="button" class="btn btn-outline-secondary">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                      </svg>
                                </a>
                            </td>
                            <td>
                                <form action="/{{$id}}/{{$item->ID}}/delete-Room" method="POST">
                                    {{ csrf_field() }}
                                    <button class="btn btn-outline-danger">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                      </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#filterBeds").on("keyup", function() {
          var value = $(this).val();
          $("#roomResults tr").hide().filter(function() {
            if(value == ""){
                return true;
            }
            return ~~$("td:eq(0)", this).first().text() == value;
          }).show();
        });
      });
      $(document).ready(function(){
        $("#filterPrice").on("keyup", function() {
          var value = $(this).val();
          $("#roomResults tr").hide().filter(function() {
            if(value == ""){
                return true;
            }
            return ~~$("td:eq(2)", this).first().text() == value;
          }).show();
        });
      });
      $(document).ready(function(){
        $("#filterRoomNr").on("keyup", function() {
          var value = $(this).val();
          $("#roomResults tr").hide().filter(function() {
            if(value == ""){
                return true;
            }
            return ~~$("td:eq(1)", this).first().text() == value;
          }).show();
        });
      });
      </script>   
@endsection