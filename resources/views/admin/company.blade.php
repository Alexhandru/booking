@extends('layouts.admdboard')

@section('admin-content')
<style>
    .urlfix{
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
                    <a href="/dashboard/company/add" class="btn btn-primary">Add a new company</a>
                </div>
                <div class="col">
                    <input class="form-control" id="search" type="text" placeholder="Search..">
                </div>
            </div>
            <br><br>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telephone</th>
                        <th scope="col">Description</th>
                        <th scope="col">LogoPicURL</th>
                    </tr>
                </thead>
                <tbody id="companyResults">
                    @foreach ($company as $item)
                    <tr>
                        <td scope="row">{{$item->ID}}</th>
                        <td>{{$item->Name}}</td>
                        <td>{{$item->Email}}</td>
                        <td>{{$item->Telephone}}</td>
                        <td>{{$item->Description}}</td>
                        
                        <td>
                            <div class="urlfix">
                                {{$item->LogoPicURL}}
                            </div>
                        </td>
                        
                        <td>
                            <a href="/dashboard/company/{{$item->ID}}/edit" type="button" class="btn btn-outline-secondary">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </a>
                        </td>
                        <td>
                            <form action="/{{$item->ID}}/delete-Company" method="POST">
                                {{ csrf_field() }}
                                <button class="btn btn-outline-danger">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                                </button>
                            </form>
                        </td>
                    <tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    $("#search").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#companyResults tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
  </script>    
@endsection