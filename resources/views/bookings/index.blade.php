@extends('components.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List of Bookings</h2>
            </div>
        </div>
    </div>
    <br/>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Nr</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">From</th>
        <th scope="col">To</th>
        <th scope="col">Room</th>
        <th scope="col">Seat</th>
    </tr>
    </thead>
    <tbody class="table-group-divider">
    @foreach($bookings as $booking)
        <tr>
            <td>{{$booking->id}}</td>
            <td>{{$booking->name}}</td>
            <td>{{$booking->email}}</td>
            <td>{{$booking->time_from}}</td>
            <td>{{$booking->time_to}}</td>
            <td>{{$booking->room->room_name}}</td>
            <td>{{$booking->seat->seat_nr}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
    <div style="position:fixed; left: 25px; bottom:15px;">
        <a href="/" class="btn btn-primary">Back to movies</a>
    </div>

@endsection
