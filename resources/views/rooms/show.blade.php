@extends ('components.layout')

@section('content')

    <div class="row">
        <div class="mb-3">
            <div class="pull-left">
                <h2> Show Room Details</h2>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="mb-3">
            <div class="form-group">
                <strong>Room Name:</strong>
                {{ $room->room_name }}
            </div>
        </div>
        <div class="mb-3">
            <div class="form-group">
                <strong>Movie Title:</strong>
                {{ $room->movie_title }}
            </div>
        </div>
        <div class="mb-3">
            <div class="form-group">
                <strong>Movie Description:</strong>
                {{ $room->movie_description }}
            </div>
        </div>

        <div class="mb-3">
            <a class="btn btn-primary" href="{{ route('rooms.index') }}"> Back</a>
        </div>

    </div>

@endsection
