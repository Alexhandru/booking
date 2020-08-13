@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div>
            <a href="/gallery/{{$roomID}}/add-Photo" class="btn btn-primary">Add a new Photo</a>
            <br><br>
            @php ($i = 1)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nr.</th>
                        <th scope="col">URL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($images as $image)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$image->URL}}</td>
                            <td>
                                <form action="/{{$roomID}}/{{$image->ID}}/delete-Photo" method="POST">
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

@endsection