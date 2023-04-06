<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking app</title>

    <link rel="stylesheet" href="/app.css">

    <!-- CSS only BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- ICONS BOOTSTRAP-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- JavaScript Bundle with Popper BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;700&family=Playfair+Display:ital,wght@0,500;1,400;1,600&display=swap"
        rel="stylesheet">
    <style>
        * {
            font-family: 'Playfair Display', serif;
        }

        .h-font {
            font-family: 'Dancing Script', cursive;
        }

    </style>
    <link rel="stylesheet" href="/app.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="/"> <i class="bi bi-film"></i>CinemaXBookingSystem</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               {{-- <li class="nav-item">
                    <a class="nav-link active me-2" aria-current="page" href="#"><i class="bi bi-house-fill"></i>Home</a>
                </li>--}}
                <li class="nav-item">
                    <a class="nav-link me-2" href="{{ route('bookings.index') }}"><i class="bi bi-list-ul"></i>Bookings</a>
                </li>
                @can('admin')
                <li class="nav-item">
                    <a class="nav-link me-2" href="{{ route('seats.index') }}"><i class="bi bi-pin-map-fill"></i>Seats</a>
                </li>
                @endcan
            </ul>


                @auth
                    <span class="text-md-center font-bold uppercase me-md-2 "><i class="bi bi-person-square"></i>Welcome, {{auth()->user()->firstname}}!</span>

                    <form method="POST" action="/logout" class="text-xs font-semibold  ">
                        @csrf
                        <button class="btn btn-outline-dark shadow-none " type="submit"><i class="bi bi-box-arrow-left"></i>Log Out</button>
                    </form>

                @else
                <a href="/login" class="btn btn-outline-dark shadow-none me-md-2 "><i class="bi bi-person-vcard"></i>Login</a>
                <a href="/register" class="btn btn-outline-dark shadow-none "><i class="bi bi-person-add"></i>Register</a>
                @endauth

        </div>
    </div>
</nav>



<div class="text-center">
    <h1 class="display-4">Welcome to CinemaX</h1>
    <br />
    <h5 class="text-center"> Book your seat and start the adventure!</h5>
</div>
<br />




@if ($message = Session::get('success'))
    <div x-data="{show:true}"
         x-init="setTimeout(()=>show = false, 4000)"
         x-show="show"
        class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="row row-cols-1 row-cols-md-3 g-5">


    @foreach ($rooms as $room)
        <div class="col" >
            <div class="card border-info h-100 mb-1 mx-1 " style="width: 29rem;">
                <div class="card-header">
                    <img  height="350px"  src="{{asset('/storage/image/rooms/'.$room->image)}}" class="card-img-top" alt="unloaded">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$room->room_name}} - {{$room->movie_title}}</h5>
                    <p class="card-text"> {{$room->movie_description}}</p>
                </div>
                <div class="card-footer bg-transparent border-white">
                    <a href="{{ url('/rooms/'.$room->id.'/seats')}}" class="btn btn-info"><i class="bi bi-pin-map-fill"></i>Book your seat here!</a>
                </div>
            </div>
            <div class="d-grid gap-3 d-md-flex justify-content-md-start">
                @can('admin')
            <a class="btn btn-secondary" href="{{ route('rooms.show',$room->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('rooms.edit',$room->id) }}">Edit</a>
            <form  action="{{ route('rooms.destroy', $room->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"  class="btn btn-danger">Delete</button>
            </form>
                @endcan
             </div>
            <br/>



        </div>


    @endforeach


</div>
@can('admin')
<div style="position:fixed; right: 25px; bottom:15px;">
    <a href="{{route('rooms.create')}}" class="btn btn-success"><i class="bi bi-clipboard2-plus">Add new item</i></a>
</div>
@endcan

</body>
</html>
