<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Backpack for Laravel</title>

    <!-- Fonts -->
    <!--<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">-->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src ="js/ajax.js"></script>
  
    <!-- Styles -->
    <style>
    html,
    body {
        color:black;
        font-family: 'Quicksand', sans-serif;
        font-weight: 200;
        margin: 0;
    }

    .container{
        max-width: 1280px;
        padding: 50px;
        height: 100%;
        color: black;
    }

    .form-content{
        width: 60%;
        margin:0 auto;
        display:block;
    }

    .flex-center {
        align-items: center;
        display: block;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
        color: #467fd0;
    }

    .links{
        padding: 20px;
        height: auto;
        display: block;
        text-align: right;
        width: 100%;
    }

    .links>a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .spacings{
        padding: 30px;
        display: grid;
        grid-template-columns: repeat(4, lfr);
        max-width: 100%;
        gap: 20px;
    }
    .card-columns {
       display:inline-block;
}

    .m-b-md {
        margin-bottom: 30px;
    }

    .m-t-lg {
        margin-top: 60px;
    }

    a:hover {
        color: #7C69EF;
    }

    .backGG {
        height: 100%;
        width: 100%;
        background: black;
        position: absolute;
        background-image: url('{{ asset('assets/backG.jpg')}}');
        background-size: cover;
        z-index: -1;
        background-repeat: no-repeat;
    background-attachment: fixed;

        
    }

    .loglo {
        position: absolute;
        left: 43%;
        top:10%;
    }

    .wrap{
        background: white;
        margin-top:5%;
        padding: 50px;
        height: 100%;
        width: 100%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    </style>
</head>

<body>
    <div class="backGG"></div>
    <div class="container">
        <div class="wrap flex-center">
            
            @if (Route::has('login'))
            <div class="links">
                @auth('web')
                    <a href="{{ url('/bookings') }}">My Account</a>
                @endauth

                @auth('admin')
                    <a href="{{ url('/dashboard/main') }}">Dashboard</a>
                @endauth

                @guest('admin')
                    @guest('web')
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endguest
                @endguest
            </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <img src="https://i.ibb.co/RSPdsnw/boo-king.png" alt="Backpack for Laravel" height="250" width="250">
                </div>
                <div class="m-t-lg form-content">
                    <form method="post" data-route="{{route('postData')}}" id="fetch">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <span class="form-label">Your Destination</span>
                            <input name='destination' class="form-control" type="text" placeholder="Enter a destination or hotel name">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <span class="form-label">Check In</span>
                                    <input id="checkIn" class="form-control" type="date" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <span class="form-label">Check out</span>
                                    <input id="checkOut" class="form-control" type="date" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span class="form-label">Rooms</span>
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select>
                                    <span class="select-arrow"></span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span class="form-label">Persons</span>
                                    <select id="persons" name="persons" class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                    </select>
                                    <span class="select-arrow"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-btn">
                            <button class="submit-btn">Check availability</button>
                        </div>
                        <br>
                    </form>
                    <div id="textResults">

                    </div>
                    <div class="card-columns" id="fetchResults">
                    
                    </div>    
                </div>
                
            </div>
        </div>
    </div>
</body>

</html>