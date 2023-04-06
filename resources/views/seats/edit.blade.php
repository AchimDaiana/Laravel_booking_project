@extends('components.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Seat</h2>
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

    <form action="{{ route('seats.update',$seat->id) }}" method="POST">
        @csrf
        @method('PUT')


        <div class="row">
            <div class="mb-3">
                <div class="form-group">
                    <strong>Seat Number:</strong>
                    <input type="text" name="seat_nr" class="form-control" placeholder="SeatNumber">
                </div>
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <strong>Is Booked:</strong>
                    <input type="checkbox" name="is_booked">
                </div>
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <strong>RoomId</strong>
                    <select name="room_id" class="form-control">
                        @foreach($rooms as $room)
                            <option value="{{ $room->id }}">{{ $room->room_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="d-grid gap-2 d-md-block">
                <input type="submit" value="Save" class="btn btn-success"/>
                <a href="{{ route('seats.index') }}" class="btn btn-primary">Back to list</a>
            </div>
        </div>

    </form>

@endsection
