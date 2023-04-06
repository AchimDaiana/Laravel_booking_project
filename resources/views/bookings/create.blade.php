@extends('components.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Booking</h2>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('bookings.store') }}" method="POST" >
        @csrf

        <div class="row">
            <div class="mb-3">
                <div class="form-group">
                    <strong>Name</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <strong>Email</strong>
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <strong>TimeFrom</strong>
                    <input type="time" name="time_from" class="form-control" placeholder="TimeFrom">
                </div>
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <strong>TimeTo</strong>
                    <input type="time" name="time_to" class="form-control" placeholder="TimeTo">
                </div>
            </div>

            <div class="mb-3">
                <label for="room_id" class="col-form-label"><strong>Room</strong></label>
                <select name="room_id" class="form-control">
                    @foreach($rooms as $room)
                        <option value="{{ $room->id }}">{{ $room->room_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="seat_id" class="col-form-label"><strong>Seat</strong></label>
                <select name="seat_id" class="form-control">
                    @foreach($seats as $seat)
                        <option value="{{ $seat->id }}">{{ $seat->seat_nr }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-grid gap-2 d-md-block">
                <input type="submit" value="Save" class="btn btn-success"/>
                <a href="{{ url()->previous() }}"  class="btn btn-primary">Back to seats</a>
            </div>
        </div>

    </form>

@endsection


{{--@extends('components.layout')

@section('content')

    <div class="modal fade" id="modalBooking" tabindex="-1" aria-labelledby="modalBookingLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalBookingLabel">New booking</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('bookings.store') }}" method="POST" >
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" id="name">
                        </div><div class="mb-3">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="time_from" class="col-form-label">TimeFrom:</label>
                            <input type="time" class="form-control" id="time_from">
                        </div>
                        <div class="mb-3">
                            <label for="time_to" class="col-form-label">TimeTo:</label>
                            <input type="time" class="form-control" id="time_to">
                        </div>

                        <div class="mb-3">
                            <label for="room_id" class="col-form-label">Room:</label>
                            <select name="room_id" class="form-control">
                                @foreach($rooms as $room)
                                    <option value="{{ $room->id }}">{{ $room->room_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="seat_id" class="col-form-label">Seat:</label>
                            <select name="seat_id" class="form-control">
                                @foreach($seats as $seat)
                                    <option value="{{ $seat->id }}">{{ $seat->seat_nr }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" value="Save" class="btn btn-success"/>
                        </div>

</form>
                </div>

            </div>
            </div>
        </div>
    </div>--}}



