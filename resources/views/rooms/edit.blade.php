@extends('components.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit the Room</h2>
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

    <form action="{{ route('rooms.update',$room->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="mb-3">
                <div class="form-group">
                    <strong>Room Name:</strong>
                    <input type="text" name="room_name" class="form-control" placeholder="RoomName">
                </div>
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <strong>Movie Title:</strong>
                    <input type="text" name="movie_title" class="form-control" placeholder="MovieTitle">
                </div>
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <strong>Movie Description:</strong>
                    <textarea class="form-control" style="height:150px" name="movie_description"
                              placeholder="MovieDescription"></textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Select room image</label>
                <input class="form-control" type="file" name="image" id="formFile">
            </div>

            <div class="d-grid gap-2 d-md-block">
                <input type="submit" value="Save" class="btn btn-success"/>
                <a href="{{ route('rooms.index') }}" class="btn btn-primary">Back to list</a>
            </div>
        </div>

    </form>

@endsection
