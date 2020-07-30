<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Backpack for Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

</head>
<body>

        <h3>Room Number: {{$roomNR}}</h3>
        <br>
        <h3>Reviews: </h3>
        <ul>
        @foreach($values as $value)
             <a>{{$value->name}} :</a>
             <li>{{$value->Description}}</li>
        @endforeach
        </ul>
        @foreach($images as $image)
            <img src="{{ URL::asset($image->URL) }}" alt="Backpack for Laravel" height="250" width="250">
        @endforeach
   
</body>
   
    

